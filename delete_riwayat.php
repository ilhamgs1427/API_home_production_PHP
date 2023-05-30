<?php

require "config.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {

    $response = array();
    $id_orders = $_POST['id_orders'];

    $insert = "DELETE FROM orders WHERE id_orders='$id_orders'";
    $delete = (mysqli_query($connection, $insert));
    if ($delete) {
        $response['value'] = 1;
        $response['message'] = "berhasil delete";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "gagal";
        echo json_encode($response);
    }
}