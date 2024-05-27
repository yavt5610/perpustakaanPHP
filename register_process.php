<?php
//YesayaAVT
session_start();
include_once("connect.php");

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Periksa duplikasi email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0) {
        echo "Email sudah terdaftar.";
    } else {
        // Jika email belum terdaftar, tambahkan pengguna baru ke database
        $insert_query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        if(mysqli_query($db, $insert_query)) {
            echo "Pendaftaran berhasil.";
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($db);
        }
    }
} else {
    echo "Email dan password harus diisi.";
}
?>