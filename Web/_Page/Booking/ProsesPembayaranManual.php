<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingPayment.php";
    $TanggalBooking=date('Y-m-d H:i');
    if(empty($_POST['id_transaksi'])){
        echo '  <span class="text-danger">';
        echo '      ID Transaksi Tidak Boleh Kosong!';
        echo '  </span>';
    }else{
        if(empty($_POST['metode'])){
            echo '  <span class="text-danger">';
            echo '      Silahkan Pilih Metode Pembayaran Terlebih Dulu!';
            echo '  </span>';
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $metode=$_POST['metode'];
            //Update Pembayaran
            $UpdatePembayaran = mysqli_query($Conn,"UPDATE transaksi_pembayaran SET 
                metode='Transfer',
                server_key='$metode'
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
            if($UpdatePembayaran){
                $_SESSION ["NotifikasiSwal"]="Update Pembayaran Berhasil";
                echo '<small class="text-success" id="NotifikasiPembayaranManualBerhasil">Success</small>';
            }else{
                echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data Pembayaran</small>';
            }
        }
    }
?>