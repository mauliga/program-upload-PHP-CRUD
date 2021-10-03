<html>
<head>
    <title>Aplikasi CRUD dengan PHP</title>
    <h1>Tambah Data Keluarga</h1>
    <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
    <table cellpadding="8">
    <tr>
        <td>No_KTP</td>
        <td><input type="text" name="no_ktp"></td>
    </tr> 
<tr>
        <td>Nama</td>
        <td><input type="text" name="nama"></td>
</tr>
<tr>
    <td>Jenis Kelamin</td>
</td>
<input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
</td>
</tr>
<tr>
    <td>Telepon</td>
    <td><input type="text" name="telp"></td>
</tr>
<tr>
    <td><Alamat</td>
    <td>Alamat</td>
    <td><textarea name="alamat"></textarea></td>
</tr>
<tr>
    <td>Foto</td>
    <td><input type="file" name="foto"></td>
</tr>
</table>

<hr>
<input type="sumbit" value="Simpatn">
<a href="index.php"><input type="button" value="Batal"></a>
</form>
</body>
</html>
