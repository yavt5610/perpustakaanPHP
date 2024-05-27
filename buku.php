<?php
include_once("./connect.php");
$query = mysqli_query($db, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Daftar Buku Perpustakaan</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>ISBN</th>
                    <th>Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $buku): ?>
                <tr>
                    <td><?php echo $buku["id"]; ?></td>
                    <td><?php echo $buku["nama"]; ?></td>
                    <td><?php echo $buku["isbn"]; ?></td>
                    <td><?php echo $buku["unit"]; ?></td>
                    <td>
                        <a href="./editBuku.php?id=<?php echo $buku['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="./hapusBuku.php?id=<?php echo $buku['id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="./tambahBuku.php" class="btn btn-primary mt-3">Tambah data buku</a>
        <a href="./index.php" class="btn btn-secondary mt-3">Kembali ke halaman utama</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>