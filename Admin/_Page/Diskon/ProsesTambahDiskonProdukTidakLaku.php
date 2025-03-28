<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Mengambil data
    if(empty($_POST['periode_awal'])){
        echo '<div class="alert alert-danger" role="alert">Periode Awal Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['periode_akhir'])){
            echo '<div class="alert alert-danger" role="alert">Periode Akhir Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['diskon'])){
                echo '<div class="alert alert-danger" role="alert">Diskon Buku Tidak Boleh Kosong!</span>';
            }else{
                $periode_akhir=$_POST['periode_akhir'];
                $periode_awal=$_POST['periode_awal'];
                $diskon=$_POST['diskon'];
                $query = mysqli_query($Conn, "SELECT*FROM buku");
                while ($data = mysqli_fetch_array($query)){
                    $id_buku= $data['id_buku'];
                    $judul= $data['judul'];
                    //Mencari jumlah penjualan
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_buku='$id_buku'"));
                    if($jml_data<5){
                        //Cek apakah sudah ada di data diskon
                        $ValidasiSudahAdaDiskon = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM diskon WHERE id_buku='$id_buku'"));
                        if(empty($ValidasiSudahAdaDiskon)){
                            $entry="INSERT INTO diskon (
                                id_buku,
                                judul,
                                periode_awal,
                                periode_akhir,
                                diskon
                            ) VALUES (
                                '$id_buku',
                                '$judul',
                                '$periode_awal',
                                '$periode_akhir',
                                '$diskon'
                            )";
                            $Input=mysqli_query($Conn, $entry);
                        }
                    }
                }
                $_SESSION ["NotifikasiSwal"]="Tambah Diskon Berhasil";
                echo '<small class="text-success" id="NotifikasiTambahTidakLakuBerhasil">Success</small>';
            }
        }
    }
?>