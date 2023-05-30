<?php

require "config.php";

$response = array();
$id_user = $_GET['id_user'];


$query_select_order = mysqli_query($connection, "SELECT * FROM orders WHERE id_user = '$id_user'");

while ($row_order = mysqli_fetch_array($query_select_order)) {
    # code..
    $key = array();
    
    $key['id_orders'] = $row_order['id_orders'];
    $key['id_user'] = $row_order['id_user']; 
    $key['id_product'] = $row_order['id_product'];
    $key['nama_user'] = $row_order['nama_user'];
    $key['nama_product'] = $row_order['nama_product'];
    $key['alamat'] = $row_order['alamat'];
    $key['phone'] = $row_order['phone'];
    $key['reservasi'] = $row_order['reservasi'];
    $key['metode_pembayaran'] = $row_order['metode_pembayaran'];
    $key['bukti_pembayaran'] = $row_order['bukti_pembayaran'];
    array_push($response, $key);
    }
 

echo json_encode($response);