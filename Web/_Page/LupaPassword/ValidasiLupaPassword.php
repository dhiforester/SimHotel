<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/SettingEmail.php";
    //Zona Waktu
    date_default_timezone_set("Asia/Jakarta");
    //Tanggal Sekarang
    $tanggal=date('Y-m-d H:i:s');
    //Menangkap email
    if(empty($_POST['email'])){
        echo '<span class="text-danger">Maaf!! Email Tidak Boleh Kosong, Silahkan Diisi.</span>';
    }else{
        //Menangkap token
        if(empty($_POST['token'])){
            echo '<span class="text-danger">Maaf!! Kode Validasi Tidak Boleh Kosong, Silahkan Diisi.</span>';
        }else{
            $email=$_POST['email'];
            $token=$_POST['token'];
            //Cek apakah email dan token tersebut ada?
            $Qry=mysqli_query($Conn,"SELECT*FROM pelanggan WHERE email='$email' AND token='$token'")or die(mysqli_error($Conn));
            $DataPelanggan = mysqli_fetch_array($Qry);
            if(empty($DataPelanggan["id_pelanggan"])){
                echo '<span class="text-danger">Kode verifikasi dan email yang anda gunakan tidak valid.</span>';
            }else{
                $nama=$DataPelanggan["nama"];
                $id_pelanggan=$DataPelanggan["id_pelanggan"];
                echo '<span class="text-success" id="NotifikasiValidasiLupaPasswordBerhasil">Success</span>';
                echo '<span class="text-success" id="UrlBack">index.php?Page=LupaPassword&Sub=ResetPassword&email='.$email.'&token='.$token.'</span>';
            }
        }
    }
?>