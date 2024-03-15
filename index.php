<?php
require_once('./config.php');
session_start();
// TES2

$result = mysqli_query($conn, 'SELECT * FROM mahasiswa');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <form action="proccess.php" method="post">

            <table>
                <tbody>
                    <tr>
                        <td><label for="name">Nama</label></td>
                        <td></td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td><label for="nim">NIM</label></td>
                        <td></td>
                        <td><input type="text" name="nim" id="nim"></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Jenis Kelamin</label></td>
                        <td></td>
                        <td>
                            <select name="gender" id="gender">
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <input type="submit" name="submit" value="Kirim">

        </form>
    </div>

    <br>
    <?= $_SESSION ? $_SESSION['alert'] : ''; ?>
    <br>

    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelmin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($data = mysqli_fetch_assoc($result)) {
            ?>

                <tr>
                    <td><?= $data['nim']; ?></td>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['gender']; ?></td>
                    <td>
                        <a href="/proccess.php?action=delete&id=<?= $data['id']; ?>" onclick="confirm('Hapus data?')">hapus</a>
                    </td>
                </tr>

            <?php
            }
            ?>

        </tbody>

    </table>
</body>

</html>