<?php

date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

$config['sess_cookie_name'] = 'aji';
$config['sess_expiration'] = 7200;
$config['encryption_key'] = md5(time());


// $hostname = '153.92.10.57';
// $username = 'u5064319_oprekan';
// $password = 'Oprekan123aja';
// $database = 'u5064319_oprekan';


$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'peramalan_komoditas';

$connection = mysqli_connect($hostname, $username, $password, $database);


// Check connection
if (mysqli_connect_errno()) {
    echo "Database connection failed : " . mysqli_connect_error();
    die;
}
?>


