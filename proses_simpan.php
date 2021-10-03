<?php

include "koneksi.php";

$no_ktp = $POST('no_ktp');
$nama = $POST('nama');
$jenis_kelamin = $POST('jenis_kelamin');
$telp = $POST('telp');
$alamat = $POST('alamat');
$foto = $POST('foto');
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;

if(move_uploaded_file($tmp, $path)){
    $sql = $pdo->prepare("INSERT INTO keluarga(no_ktp, nama, jenis_kelamin, telp, alamat, foto) 
    VALUES(:no_ktp,:nama,:jk,:telp,:alamat,:foto)");
    $sql->bindParam(':no_ktp', $no_ktp);
    $sql->bindParam(':nama', $nama);
    $sql->bindParam(':jk', $jenis_kelamin);
    $sql->bindParam(':telp', $telp);
    $sql->bindParam(':alamat', $alamat);
    $sql->bindParam(':foto', $foto);
    $sql->execute();

    if($sql) {
        header("location: index.php");
    }else{
        echo "maaf, Terjadi kesalahan saat menocba untuk meyimpan data ke database.";
        echo "<br><a href='from_simpan.php'>Kembali ke Form</a>";
        }
    }else{
        echo"Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='form_simpan.php'>Kembali ke Form</a>";
    }
    ?>   
