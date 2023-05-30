<?php

// Assuming you have already established a database connection

require "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $response = array();
    $id_user = $_POST['id_user'];
    $id_product = $_POST['id_product'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $reservasi = $_POST['reservasi'];
 



    // cek user
    $cekUser = mysqli_query($connection, "SELECT * FROM user WHERE id_user = '$id_user'");
    if ($cekUser) {
        $fetchUser = mysqli_fetch_array($cekUser);
        $fetchnamaUser = $fetchUser['name'];
    } else {
        $response['value'] = 0;
        $response['message'] = "Failed to fetch user data";
        echo json_encode($response);
        exit;
    }

    // cek product
    $cekProduct = mysqli_query($connection, "SELECT * FROM product WHERE id_product = '$id_product'");
    if ($cekProduct) {
        $fetchProduct = mysqli_fetch_array($cekProduct);
        $fetchnamaProduct = $fetchProduct['name'];
    } else {
        $response['value'] = 0;
        $response['message'] = "Failed to fetch product data";
        echo json_encode($response);
        exit;
    }
    
   
    // masukkan data ke table order
    $insertToOrder = "INSERT INTO orders VALUES ('', '$id_user', '$id_product', '$fetchnamaUser', '$fetchnamaProduct', '$alamat', '$phone', '$reservasi', '$metode_pembayaran', ' Jika COD Tidak perlu upload', NOW(), 1)";
    
    if (mysqli_query($connection, $insertToOrder)) {
        $response['value'] = 1;
        $response['message'] = "Yeay, Kamu berhasil reservasi";
        echo json_encode($response);
    } else {
        $response['value'] = 2;
        $response['message'] = "Maaf, kamu gagal untuk reservasi";
        echo json_encode($response);
    }
}
