<?php

class cms {
    public static function get_content( $endpoint = '' ) {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt( $ch, CURLOPT_URL, API.$endpoint );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        if( isset($_SESSION['auth']['token']) ) {
            $token = $_SESSION['auth']['token'];
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
        }

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Process the response
        if ($response) {
            // Do something with the response (e.g., decode JSON if the response is in JSON format)
            $data = json_decode($response, true);
            return $data;
        } else {
            echo 'No response received';
        }
    }

    public static function post_content( $endpoint = '', $args = array(), $custom_header = [] ) {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt( $ch, CURLOPT_URL, API.$endpoint );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        if( isset($_SESSION['auth']['token']) ) {
            $token = $_SESSION['auth']['token'];
            $header = ['Authorization: Bearer ' . $token];
            foreach( $custom_header as $value ) {
                array_push( $header, $value);
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header );
        }

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Process the response
        if ($response) {
            // Do something with the response (e.g., decode JSON if the response is in JSON format)
            $data = json_decode($response, true);
            return $data;
        } else {
            echo 'No response received';
        }
    }

    public static function delete_content( $endpoint = '' ) {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt( $ch, CURLOPT_URL, API.$endpoint );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        if( isset($_SESSION['auth']['token']) ) {
            $token = $_SESSION['auth']['token'];
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Process the response
        if ($response) {
            // Do something with the response (e.g., decode JSON if the response is in JSON format)
            $data = json_decode($response, true);
            return $data;
        } else {
            echo 'No response received';
        }
    }

    public static function authenticate( $username, $password ) {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt( $ch, CURLOPT_URL, HOST.'/wp-json/jwt-auth/v1/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'username' => $username,
            'password' => $password,
        ));

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Process the response
        if ($response) {
            // Do something with the response (e.g., decode JSON if the response is in JSON format)
            $data = json_decode($response, true);
            if(isset($data['token'])) {
                $_SESSION['auth'] = $data;
            }
            return $data;
        } else {
            echo 'No response received';
        }
    }

    public static function get_details() {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt( $ch, CURLOPT_URL, HOST.'/wp-json/headless/v1/site' );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Process the response
        if ($response) {
            // Do something with the response (e.g., decode JSON if the response is in JSON format)
            $data = json_decode($response, true);
            return $data;
        } else {
            echo 'No response received';
        }
    }
}

$site_details = cms::get_details();

function js_redirect( $url ) {
    ?><script>document.location = '<?= $url ?>'</script><?php
}

function check_permission( $response ) {
    if( isset($response['code']) && $response['code'] == 'rest_forbidden') {
        require_once '403.php';
        return false;
    }
    return true;
}