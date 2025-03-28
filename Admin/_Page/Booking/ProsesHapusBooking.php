<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_kunjungan'])){
        echo '<span class="text-danger">ID Kunjungan tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_kunjungan=$_POST['id_kunjungan'];
        //Proses hapus Kunjungan
        $HapusKunjungan = mysqli_query($Conn, "DELETE FROM pelanggan_kunjungan WHERE id_kunjungan='$id_kunjungan'") or die(mysqli_error($Conn));
        if ($HapusKunjungan) {
            $HapusRincian = mysqli_query($Conn, "DELETE FROM transaksi_rincian WHERE id_kunjungan='$id_kunjungan'") or die(mysqli_error($Conn));
            if($HapusRincian){
                echo '<span class="text-success" id="NotifikasiHapusBookingBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Data Rincian Gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Data Kunjungan Gagal</span>';
        }
    }
?>