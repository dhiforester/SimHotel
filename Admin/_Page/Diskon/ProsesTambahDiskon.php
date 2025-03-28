<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_layanan'])){
        echo '<div class="alert alert-danger" role="alert">ID Layanan Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['nama_layanan'])){
            echo '<div class="alert alert-danger" role="alert">Nama Layanan Layanan Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['periode_awal'])){
                echo '<div class="alert alert-danger" role="alert">Periode Awal Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['periode_akhir'])){
                    echo '<div class="alert alert-danger" role="alert">Periode Akhir Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['diskon'])){
                        echo '<div class="alert alert-danger" role="alert">Diskon layanan Tidak Boleh Kosong!</span>';
                    }else{
                        $nama_layanan=$_POST['nama_layanan'];
                        $id_layanan=$_POST['id_layanan'];
                        $periode_akhir=$_POST['periode_akhir'];
                        $periode_awal=$_POST['periode_awal'];
                        $diskon=$_POST['diskon'];
                        //Validasi Duplikasi data
                        $ValidasiDataDuplikat= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM diskon WHERE id_kamar='$id_layanan' AND tanggal_mulai='$periode_awal' AND tanggal_selesai='$periode_akhir' AND diskon='$diskon'"));
                        if(!empty($ValidasiDataDuplikat)){
                            echo "<div class='alert alert-danger' role='alert'><span class='text-danger'>Data tersebut sudah ada!!</span></div>";
                        }else{
                            $entry="INSERT INTO diskon (
                                id_kamar,
                                tanggal_mulai,
                                tanggal_selesai,
                                diskon
                            ) VALUES (
                                '$id_layanan',
                                '$periode_awal',
                                '$periode_akhir',
                                '$diskon'
                            )";
                            $Input=mysqli_query($Conn, $entry);
                            if($Input){
                                echo '<small class="text-success" id="NotifikasiTambahDiskonBerhasil">Success</small>';
                            }else{
                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data diskon</small>';
                            }
                        }
                    }
                }
            }
        }
    }
?>