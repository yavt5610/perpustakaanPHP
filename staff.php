<?php
include_once("./connect.php");
$query = mysqli_query($db, "SELECT * FROM staff");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Daftar Staff Perpustakaan</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $staff): ?>
                <tr>
                    <td><?php echo $staff["id"]; ?></td>
                    <td><?php echo $staff["nama"]; ?></td>
                    <td><?php echo $staff["telp"]; ?></td>
                    <td><?php echo $staff["email"]; ?></td>
                    <td>
                        <a href="./editDataStaff.php?id=<?php echo $staff['id']; ?>"
                            class="btn btn-warning btn-sm">Edit</a>
                        <a href="./hapusStaff.php?id=<?php echo $staff['id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus staff ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="./tambahStaff.php" class="btn btn-primary mt-3">Tambah data staff</a>
        <a href="./index.php" class="btn btn-secondary mt-3">Kembali ke halaman utama</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>