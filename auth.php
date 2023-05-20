<?php

include "config/config.php";
include "config/helper.php";

$username = $_POST['username'];
$password     = $_POST['password'];


$query = mysqli_query($connection, "SELECT * FROM user WHERE username ='$username'");

$row = mysqli_fetch_array($query);


if ($row) {

    if (password_verify($password, $row['password'])) {
        set_cookies($config);
        session_start();
        $sess_data = array(
            'id_user' => $row['id_user'],
            'username' => $row['username'],
            'name' => $row['name'],
        );

        $_SESSION[$config['encryption_key']] = $sess_data;

        session_flash('notif', 'Berhasil Login! Welcome Back ' . $row['username'], 'alert alert-success');

        header('location:module.php?module=home');
    } else {

        session_flash('auth', 'Gagal Login! PASSWORD Anda salah', 'alert alert-danger');
        header('location:index.php');
    }
} else {

    session_flash('auth', 'Gagal Login! USERNAME Anda tidak ditemukan', 'alert alert-danger');
    header('location:index.php');
}
