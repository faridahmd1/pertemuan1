<?php
require_once('./config.php');

session_start();

$_SESSION['alert'] = '';

if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $nim = htmlspecialchars(trim($_POST['nim']));
    $gender = htmlspecialchars(trim($_POST['gender']));

    $result = mysqli_query($conn, "INSERT INTO `mahasiswa`(`nim`,`name`,`gender`) VALUES('$nim','$name','$gender');");
    if ($result) {
        $_SESSION['alert'] = 'Data berhasil disimpan';
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {

        $id = htmlspecialchars(trim($_GET['id']));
        $result = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id ='$id'");
        if ($result) {
            $_SESSION['alert'] = 'Data berhasil dihapus';
        }
    }
}

header('location:index.php');
