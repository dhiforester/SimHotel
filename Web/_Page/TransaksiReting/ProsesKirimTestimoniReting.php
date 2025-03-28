<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
     //Validasi id_transaksi tidak boleh kosong
    if(empty($_POST['id_transaksi'])){
        echo '<small class="text-danger">ID Transaksi tidak boleh kosong</small>';
    }else{
        //Validasi reting tidak boleh kosong
        if(empty($_POST['reting'])){
            echo '<small class="text-danger">Reting tidak boleh kosong</small>';
        }else{
            //Validasi testimoni tidak boleh kosong
            if(empty($_POST['testimoni'])){
                echo '<small class="text-danger">Testimoni tidak boleh kosong</small>';
            }else{
                //Variabel
                $id_transaksi=$_POST['id_transaksi'];
                $reting=$_POST['reting'];
                $testimoni=$_POST['testimoni'];
                //Buka Data Transaksi
                $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                $id_kamar = $DataTransaksi['id_kamar'];
                //Simpan Data Pelanggan
                $EntryTestimoni="INSERT INTO testimoni (
                    id_pelanggan,
                    id_transaksi,
                    tanggal,
                    testimoni,
                    status
                ) VALUES (
                    '$SessionIdPelanggan',
                    '$id_transaksi',
                    '$now',
                    '$testimoni',
                    'Pending'
                )";
                $InputTestimoni=mysqli_query($Conn, $EntryTestimoni);
                if($InputTestimoni){
                    //Simpan Data Reting
                    $EntryReting="INSERT INTO reting (
                        id_pelanggan,
                        id_kamar,
                        id_transaksi,
                        reting
                    ) VALUES (
                        '$SessionIdPelanggan',
                        '$id_kamar',
                        '$id_transaksi',
                        '$reting'
                    )";
                    $InputReting=mysqli_query($Conn, $EntryReting);
                    if($InputReting){
                        $_SESSION ["NotifikasiSwal"]="Testimoni Berhasil";
                        echo 'Proses: <small class="text-success" id="NotifikasiKirimTestimoniRetingBerhasil">Success</small><br>';
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data reting</small>';
                    }
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data testimoni</small>';
                }
            }
        }
    }
?>