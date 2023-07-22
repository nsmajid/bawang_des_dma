<?php
include "../../config/config.php";
include "../../config/helper.php";

$module = $_GET['module'] ? $_GET['module'] : NULL;
$action = $_GET['action'] ? $_GET['action'] : NULL;


// Delete
if ($action == 'delete') {

    $sql = "DELETE FROM harga_komoditas WHERE id_harga_komoditas='$_GET[id]'";
}

// Insert
elseif ($action == 'insert') {

    $sql = "INSERT INTO harga_komoditas(id_provinsi,id_komoditas,tanggal,harga) VALUES('$_POST[id_provinsi]','$_POST[id_komoditas]','$_POST[tanggal]','$_POST[harga]')";
}

// Update 
elseif ($action == 'update') {

    $sql = "UPDATE harga_komoditas SET id_provinsi = '$_POST[id_provinsi]',id_komoditas = '$_POST[id_komoditas]',tanggal = '$_POST[tanggal]',harga = '$_POST[harga]' WHERE id_harga_komoditas='$_POST[id_harga_komoditas]'";
}

// execute
if ($connection->query($sql)) {
    session_flash('notif', 'Berhasil ' . $action . ' !', 'alert alert-success');
} else {
    session_flash('notif', 'Gagal ' . $action . ' !', 'alert alert-danger');
}

header('location:../../module.php?module=' . $module);
