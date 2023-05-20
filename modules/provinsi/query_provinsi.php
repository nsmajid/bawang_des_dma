<?php
include "../../config/config.php";
include "../../config/helper.php";

$module = $_GET['module'] ? $_GET['module'] : NULL;
$action = $_GET['action'] ? $_GET['action'] : NULL;


// Delete
if ($action == 'delete') {

    $sql = "DELETE FROM provinsi WHERE id_provinsi='$_GET[id]'";
}

// Insert
elseif ($action == 'insert') {

    $sql = "INSERT INTO provinsi(nama_provinsi) VALUES('$_POST[nama_provinsi]')";
}

// Update 
elseif ($action == 'update') {

    $sql = "UPDATE provinsi SET nama_provinsi = '$_POST[nama_provinsi]' WHERE id_provinsi='$_POST[id_provinsi]'";
}

// execute
if ($connection->query($sql)) {
    session_flash('notif', 'Berhasil ' . $action . ' !', 'alert alert-success');
} else {
    session_flash('notif', 'Gagal ' . $action . ' !', 'alert alert-danger');
}

header('location:../../module.php?module=' . $module);
