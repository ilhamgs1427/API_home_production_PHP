<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();

    $id_orders = $_POST['id_orders'];
    $buktiName_pembayaran = date('dmYHis').str_replace(" ", "", basename($_FILES['bukti_pembayaran']['name']));
    $imagepath = "upload/" . $buktiName_pembayaran;
    move_uploaded_file($_FILES['bukti_pembayaran'] ['tmp_name'], $imagepath);
    
    $query = "UPDATE orders SET bukti_pembayaran ='$imagepath' WHERE id_orders='$id_orders'";
    $update = mysqli_query($connection, $query);

    if ($update) {
        $response['value'] = 1;
        $response['message'] = "berhasil ditambahkan";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "gagal";
        echo json_encode($response);
    }
}
?>

