<?php
include "../../config/config.php";
include "../../config/helper.php";

$module = $_GET['module'] ? $_GET['module'] : NULL;
$action = $_GET['action'] ? $_GET['action'] : NULL;


// Delete
if ($action == 'delete') {

    $sql = "DELETE FROM user WHERE id_user='$_GET[id]'";
}

// Insert
elseif ($action == 'insert') {
    $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO user(username,password,email,level_name) VALUES('$_POST[username]','$password','$_POST[email]','$_POST[level_name]')";
}

// Update 
elseif ($action == 'update') {
    if ($_POST['password']) {
        $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE user SET username = '$_POST[username]',password = '$password',email = '$_POST[email]',level_name = '$_POST[level_name]' WHERE id_user='$_POST[id_user]'";
    } else {

        $sql = "UPDATE user SET username = '$_POST[username]',email = '$_POST[email]',level_name = '$_POST[level_name]' WHERE id_user='$_POST[id_user]'";
    }
}

// execute
if ($connection->query($sql)) {
    session_flash('notif', 'Berhasil ' . $action . ' !', 'alert alert-success');
} else {
    session_flash('notif', 'Gagal ' . $action . ' !', 'alert alert-danger');
}

header('location:../../module.php?module=' . $module);
