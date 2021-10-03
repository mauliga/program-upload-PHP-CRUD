<?php

include "koneksi.php";

$id = $_GET['id'];

$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if(empty($foto)){
    $sql = $pdo->prepare("UPDATE keluarga Set No_ktp=:No_ktp, nama=:nama, jenis_kelamin=:jk, telp=:telp, alamat=:alamat WHERE id");
    $sql->bindParam('no_ktp', $no_ktp);
    $sql->bindParam('nama', $nama);
    $sql->bindParam('jk', $jenis_kelamin);
    $sql->bindParam('telp', $telp);
    $sql->bindParam('alamat', $alamat);
    $sql->bindParam('id:');
    $sql->execute();
    
    if($sql){
        header("location: index.php");
    }else{
        echo "Maaf, telah terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
         }
        }else{
            $fotobaru = date('dmYHis').$foto;
            $path = date('dmYHis').$foto;
            
            if(move_uploaded_file($tmp, $path)){
                $sql = $pdo->prepare("SELECT foto FROM keluarga WHERE id=:id");
                $sql->bindParam(':id', $id);
                $sql->execute();
                $data = $sql->fetch();

                if(is_file("images/".$data['foto']))
                    unlink("images/".$data['foto']);

                $sql = $pdo->prepare("UPDATE keluarga SET no_ktp=:no_ktp, nama=:nama, jenis_kelamin=:jk, telp=:telp, alamat=:alamat, foto=:foto WHERE id=:id");
                $sql->bindParam(':no_ktp', $no_ktp);
                $sql->bindParam(':nama', $nama);
                $sql->bindParam(':jk', $jenis_kelamin);
                $sql->bindParam(':telp', $telp);
                $sql->bindParam(':alamat', $alamat);
                $sql->bindParam(':foto', $fotobaru);
                $sql->bindParam(':id', $id);
                $execute = $sql->execute();

                if($sql)

                header("location: index.php");

            }else{
                    echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                    echo "<br><a href='form_ubah.php'>Kembali ke Form</a>";

                }

            }
        ?>     



