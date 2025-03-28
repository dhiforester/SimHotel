<?php
    //Connection
    session_start();
    include "../../_Config/Connection.php";
    if(empty($_POST['id_kamar'])){
        echo '<span class="text-danger">ID Kamar Tidak Boleh Kosong</span>';
    }else{
        $id_kamar=$_POST['id_kamar'];
        //Proses hapus data
        $Hapuskamar = mysqli_query($Conn, "DELETE FROM kamar WHERE id_kamar='$id_kamar'") or die(mysqli_error($Conn));
        if ($Hapuskamar) {
            echo '<span class="text-success" id="NotifikasiHapusKamarBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data ini</span>';
        }
    }
?>