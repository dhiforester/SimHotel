<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi pesan tidak boleh kosong
    if(empty($_POST['pesan'])){
        echo 'Pesan Kosong';
    }else{
        //Validasi id_pelanggan tidak boleh kosong
        if(empty($_POST['id_pelanggan'])){
            echo 'Pelanggan Kosong';
        }else{
            $pesan=$_POST['pesan'];
            $id_pelanggan=$_POST['id_pelanggan'];
            $EntryChat="INSERT INTO chating (
                kategori,
                id_akses,
                id_pelanggan,
                tanggal,
                pesan,
                status
            ) VALUES (
                'AdminToPelanggan',
                '$SessionIdAkses',
                '$id_pelanggan',
                '$now',
                '$pesan',
                'Pending'
            )";
            $InputChat=mysqli_query($Conn, $EntryChat);
            if($InputChat){
                echo 'Terkirim';
            }else{
                echo 'Gagal';
            }
        }
    }
?>