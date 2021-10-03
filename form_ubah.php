<html>
<head>
    <title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
    <h1>Ubah Data Keluarga</h1>

    <?php
    include "koneksi.php";

    $id = $GET['id'];

    $sql = $pdo->prepare("SELECT * FROM keluarga WHERE id=id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $data = $sql->fetch();
    ?>

    <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>"
    enctype="multipart/form-data">
        <table cellpading="8">
            <tr>
                <td>no_ktp</td>
                <td><input type="text" name="no_ktp" value="<?php echo $data['no_ktp']; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
        <td>
        <?php
        if($data['jenis_kelamin'] == "Laki-laki") {
            echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'>Laki-Laki";
            echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'>perempuan";
        }else{
            echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'>Laki-Laki";
            echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'>perempuan";
        }
        ?>
        </td>
        </tr>
        <tr>
        <td>Telepon</td>
        <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>></td>
        </tr>
        <tr>
        <td>Alamat</td>
        <td><textarea name="alamat"><?php echo $data['alamat']; ?><textarea></td>
        </tr>
        <tr>
        <td>Foto</td>
        <td>
        <input type="file" name="foto">
        </td>
        </tr>
        </table>

        <hr>
        <input type="sumbit" value="Ubah">
        <a href="index.php"><input type="button" value="Batal"></a>
        </form>
        </body>
        </html>


