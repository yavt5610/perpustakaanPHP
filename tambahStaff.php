<?php
include_once("./connect.php");

$message = "";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $query = mysqli_query($db, "INSERT INTO staff (nama, telp, email) VALUES ('$nama', '$telp', '$email')");
    if ($query) {

        $max_id_query = mysqli_query($db, "SELECT MAX(id) FROM staff");
        $max_id_result = mysqli_fetch_array($max_id_query);
        $max_id = $max_id_result[0];

        // nilai id maksimum ditambah 1
        mysqli_query($db, "ALTER TABLE staff AUTO_INCREMENT = " . ($max_id + 1));
        
        $message = "Data staff berhasil ditambahkan.";
        // JavaScript menampilkan pop up
        echo '<script>alert("'.$message.'");</script>';
    } else {
        $message = "Gagal menambahkan data staff.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Tambah Data Staff Perpustakaan</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telepon:</label>
                <input type="text" class="form-control" id="telp" name="telp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Staff</button>
        </form>
        <br>
        <a href="./staff.php" class="btn btn-secondary">Kembali ke halaman data staff</a>
    </div>
</body>

</html>