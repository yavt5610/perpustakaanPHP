<?php
include_once("./connect.php");

$message = "";

// Ambil ID buku yang akan diedit dari URL jika tersedia
$id_buku = $_GET['id'];

// Ambil data buku dari database berdasarkan ID yang dipilih
$query_data = mysqli_query($db, "SELECT * FROM buku WHERE id = $id_buku");
$data_buku = mysqli_fetch_assoc($query_data);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $isbn = $_POST["isbn"];
    $unit = $_POST["unit"];

    // Perbarui data buku dalam database
    $query = mysqli_query($db, "UPDATE buku SET nama='$nama', isbn='$isbn', unit='$unit' WHERE id = $id_buku");
    if ($query) {
        $message = "Data buku berhasil diperbarui.";
        // Kode JavaScript untuk menampilkan pop up
        echo '<script>alert("' . $message . '");</script>';
    } else {
        $message = "Gagal memperbarui data buku.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Edit Data Buku</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id_buku; ?>" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $data_buku['nama']; ?>" required><br><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?php echo $data_buku['isbn']; ?>" required><br><br>

        <label for="unit">Unit:</label><br>
        <input type="number" id="unit" name="unit" value="<?php echo $data_buku['unit']; ?>" required><br><br>

        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="./buku.php">Kembali ke halaman data buku</a>
</body>

</html>