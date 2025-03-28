<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_diskon'])){
        echo '<div class="alert alert-danger" role="alert">ID Diskon Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['periode_awal'])){
            echo '<div class="alert alert-danger" role="alert">Periode Awal Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['periode_akhir'])){
                echo '<div class="alert alert-danger" role="alert">Periode Akhir Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['diskon'])){
                    echo '<div class="alert alert-danger" role="alert">Diskon Buku Tidak Boleh Kosong!</span>';
                }else{
                    $id_diskon=$_POST['id_diskon'];
                    $periode_akhir=$_POST['periode_akhir'];
                    $periode_awal=$_POST['periode_awal'];
                    $diskon=$_POST['diskon'];
                    $UpdateDiskon = mysqli_query($Conn,"UPDATE diskon SET 
                        tanggal_mulai='$periode_awal',
                        tanggal_selesai='$periode_akhir',
                        diskon='$diskon'
                    WHERE id_diskon='$id_diskon'") or die(mysqli_error($Conn)); 
                    if($UpdateDiskon){
                        echo '<small class="text-success" id="NotifikasiEditDiskonBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data diskon</small>';
                    }
                }
            }
        }
    }
?>