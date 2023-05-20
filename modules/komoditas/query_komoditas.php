<?php
include "../../config/config.php";
include "../../config/helper.php";

$module = $_GET['module'] ? $_GET['module'] : NULL;
$action = $_GET['action'] ? $_GET['action'] : NULL;


// Delete
if ($action == 'delete') {

    $sql = "DELETE FROM komoditas WHERE id_komoditas='$_GET[id]'";
}

// Insert
elseif ($action == 'insert') {

    $sql = "INSERT INTO komoditas(nama_komoditas) VALUES('$_POST[nama_komoditas]')";
}

// Update 
elseif ($action == 'update') {

    $sql = "UPDATE komoditas SET nama_komoditas = '$_POST[nama_komoditas]' WHERE id_komoditas='$_POST[id_komoditas]'";
}

// execute
if ($connection->query($sql)) {
    session_flash('notif', 'Berhasil ' . $action . ' !', 'alert alert-success');
} else {
    session_flash('notif', 'Gagal ' . $action . ' !', 'alert alert-danger');
}

header('location:../../module.php?module=' . $module);
