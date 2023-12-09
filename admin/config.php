<?php
session_start();

define('HOST', 'http://localhost/headless-wordpress-template/cms');
define('API', HOST.'/wp-json/wp/v2/');
define('AUTH', '`,YX;8H*xuM|Vu7[HO])^G2W}!g^gU5:xNOu-e~S6uKG,|T4WhQkuxM*!~rR9Q _');

$all_roles = ['administrator', 'subscriber', 'contributor', 'editor', 'author'];
$pages = array(
    'media' => array(
        'title' => 'Media',
        'page' => './pages/media.php',
        'description' => '',
        'permission' => $all_roles
    ),
    'media-new' => array(
        'title' => 'Upload New Media',
        'page' => './pages/media-new.php',
        'description' => '',
        'permission' => $all_roles
    ),
    'users' => array(
        'title' => 'Users',
        'page' => './pages/users.php',
        'description' => '',
        'permission' => ['administrator']
    ),
    'user-new' => array(
        'title' => 'Add New Users',
        'page' => './pages/user-new.php',
        'description' => 'Create a brand new user and add them to this site.',
        'permission' => ['administrator']
    ),
    'profile' => array(
        'title' => 'Profile',
        'page' => './pages/user-edit.php',
        'description' => 'Edit your profile here.',
        'permission' => $all_roles
    ),
    'user-edit' => array(
        'title'=> 'Edit User',
        'page'=> './pages/user-edit.php',
        'description' => '',
        'permission' => ['administrator']
    ),
    'settings' => array(
        'title' => 'General Settings',
        'page' => './pages/settings.php',
        'description' => '',
        'permission' => ['administrator']
    )
);