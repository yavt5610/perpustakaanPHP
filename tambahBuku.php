<?php
include_once("./connect.php");

$message = "";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $isbn = $_POST["isbn"];
    $unit = $_POST["unit"];

    $query = mysqli_query($db, "INSERT INTO buku (nama, isbn, unit) VALUES ('$nama', '$isbn', '$unit')");
    if ($query) {

        $max_id_query = mysqli_query($db, "SELECT MAX(id) FROM buku");
        $max_id_result = mysqli_fetch_array($max_id_query);
        $max_id = $max_id_result[0];
        
        // nilai id maksimum ditambah 1
        mysqli_query($db, "ALTER TABLE buku AUTO_INCREMENT = " . ($max_id + 1));
        $message = "Data buku berhasil ditambahkan.";
        // JavaScript menampilkan pop up
        echo '<script>alert("'.$message.'");</script>';
    } else {
        $message = "Gagal menambahkan data buku.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Tambah Data Buku</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="mb-3">
                <label for="unit" class="form-label">Unit:</label>
                <input type="number" class="form-control" id="unit" name="unit" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Buku</button>
        </form>
        <br>
        <a href="./buku.php" class="btn btn-secondary">Kembali ke halaman data buku</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>