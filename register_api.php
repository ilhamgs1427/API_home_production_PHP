<?php

require "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    # code...
    $response = array();
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query_cek_user = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email'");
    $cek_user_result = mysqli_fetch_array($query_cek_user);

    if ($cek_user_result) {
        # code...
        $response['value'] = 0;
        $response['message'] = "Oops, Maaf data telah tersedia!";
        echo json_encode($response);
    } else {
        $query_insert_user = mysqli_query($connection, "INSERT INTO user VALUE('', '$full_name', '$email','$password', NOW(), 1)");
        if ($query_insert_user) {
            # code...
            $response['value'] = 1;
            $response['message'] = "Yeay, Registrasi anda telah berhasil. Mohon login dengan akun anda";
            echo json_encode($response);
        } else {
            # code...
            $response['value'] = 2;
            $response['message'] = "Oops, Maaf registrasi anda gagal";
            echo json_encode($response);
        }
    }
}
