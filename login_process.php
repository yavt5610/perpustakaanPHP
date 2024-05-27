<?php
//YesayaAVT
session_start();
include_once("connect.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // periksa email di dalam database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // buat sesi login
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
} else {
    echo "Email dan password harus diisi.";
}
?>