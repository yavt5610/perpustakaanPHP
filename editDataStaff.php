<?php
include_once("./connect.php");

$message = "";

// Jika ada pengiriman data melalui form
if (isset($_POST["submit"])) {

    // Ambil data dari form
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    // Update data staff dalam database
    $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id=$id");
    if ($query) {
        $message = "Data staff berhasil diperbarui.";
        echo '<script>alert("' . $message . '");</script>'; // Menampilkan pesan sukses menggunakan alert JavaScript
    } else {
        $message = "Gagal memperbarui data staff.";
    }
}

if (isset($_GET["id"])) {
    // Ambil ID staff 
    $id = $_GET["id"];

    // Ambil data staff dari database
    $query_data = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");
    $data_staff = mysqli_fetch_assoc($query_data);
} else {
    
    header("Location: ./staff.php");
    exit; 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Staff</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Edit Data Staff Perpustakaan</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $data_staff['id']; ?>">

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $data_staff['nama']; ?>" required><br><br>

        <label for="telp">Telepon:</label><br>
        <input type="text" id="telp" name="telp" value="<?php echo $data_staff['telp']; ?>" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $data_staff['email']; ?>" required><br><br>

        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="./staff.php">Kembali ke halaman data staff</a>
</body>

</html>