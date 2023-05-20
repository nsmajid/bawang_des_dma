<?php

session_start();
include "config/config.php";
include "config/helper.php";

unset($_SESSION[$_COOKIE[$config['sess_cookie_name']]]);

setcookie($config['sess_cookie_name'], "", time()- $config['sess_expiration'],'/');
session_flash('auth','Berhasil Logout!','alert alert-success');
header('location:index.php');
