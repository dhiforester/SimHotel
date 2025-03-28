<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_pelanggan'])){
        echo '<span class="text-danger">ID Pelanggan Tidak dapat ditangkap pada saat proses hapus data</span>';
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
        //Proses hapus data
        $HapusPelanggan = mysqli_query($Conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn));
        if ($HapusPelanggan) {
            $HapusTransaksi = mysqli_query($Conn, "DELETE FROM transaksi WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn));
            if ($HapusTransaksi) {
                echo '<span class="text-success" id="NotifikasiHapusPelangganBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Data Gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>