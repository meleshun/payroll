<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('url_origin', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/');

// DB
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'payroll';