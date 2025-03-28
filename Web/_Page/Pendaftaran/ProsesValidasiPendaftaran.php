<?php
    //Koneksi
    include "../../_Config/Connection.php";
    session_start();
    date_default_timezone_set('UTC');
    $now=date('Y-m-d H:i:s');
    //Tangkap Token
    if(empty($_POST['token'])){
        echo '<span class="text-danger">Kode Verifikasi Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['email'])){
            echo '<span class="text-danger">Email Verifikasi Tidak Boleh Kosong</span>';
        }else{
            $token=$_POST['token'];
            $email=$_POST['email'];
            //Validasi Token ada atai tidak
            $QryToken = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE token='$token' AND email='$email'")or die(mysqli_error($Conn));
            $DataToken = mysqli_fetch_array($QryToken);
            //Apabila data token pelanggan tidak ada
            if(empty($DataToken['id_pelanggan'])){
                echo '<span class="text-danger">Kode Verifikasi Tidak Valid</span>';
            }else{
                $id_pelanggan= $DataToken['id_pelanggan'];
                //Lakukan update status pelanggan
                $UpdatePelanggan = mysqli_query($Conn,"UPDATE pelanggan SET 
                    status='Active',
                    token='0',
                    datetime_update='$now'
                WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn)); 
                if($UpdatePelanggan){
                    $_SESSION ["NotifikasiSwal"]="Verifikasi Pelanggan Berhasil";
                    echo '<span class="text-success" id="NotifikasiValidasiPendaftaranBerhasil">Success</span>';
                }else{
                    echo '<span class="text-danger">Proses update status akses gagal</span>';
                }
            }
        }
    }
?>