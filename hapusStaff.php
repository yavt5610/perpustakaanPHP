<?php
include_once("./connect.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = mysqli_query($db, "DELETE FROM staff WHERE id=$id");

    $max_id_query = mysqli_query($db, "SELECT MAX(id) FROM staff");
    $max_id_result = mysqli_fetch_array($max_id_query);
    $max_id = $max_id_result[0];

    // Setel ulang auto-increment tabel staff ke nilai maksimum ditambah 1
    mysqli_query($db, "ALTER TABLE staff AUTO_INCREMENT = " . ($max_id + 1));

    header("Location: staff.php");
    exit;
}
?>