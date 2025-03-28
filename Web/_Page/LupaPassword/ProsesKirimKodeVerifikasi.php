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
        $email=$_POST['email'];
        //Cek apakah email tersebut ada?
        $Qry=mysqli_query($Conn,"SELECT*FROM pelanggan WHERE email='$email'")or die(mysqli_error($Conn));
        $DataPelanggan = mysqli_fetch_array($Qry);
        if(empty($DataPelanggan["id_pelanggan"])){
            echo '<span class="text-danger">Maaf!! Email Yang Anda Masukan Tidak Terdaftar.</span>';
        }else{
            $nama=$DataPelanggan["nama"];
            $id_pelanggan=$DataPelanggan["id_pelanggan"];
            $token=rand(10000000, 99999999);
            //Simpan data
            $UpdatePelanggan = mysqli_query($Conn,"UPDATE pelanggan SET 
                token='$token',
                datetime_update='$tanggal'
            WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn)); 
            if($UpdatePelanggan){
                //Mengirim URL ke email
                $subjek="Reset Password";
                $email_tujuan=$email;
                $pesan="
                    Anda telah mengajukan untuk melakukan reset password. silahkan masukan kode verifikasi berikut ini $token
                ";
                $ch = curl_init();
                $headers = array(
                    'Content-Type: Application/JSON',          
                    'Accept: Application/JSON'     
                );
                $arr = array(
                    "subjek" => "$subjek",
                    "email_asal" => "$email_gateway",
                    "password_email_asal" => "$password_gateway",
                    "url_provider" => "$url_provider",
                    "nama_pengirim" => "$nama_pengirim",
                    "email_tujuan" => "$email_tujuan",
                    "nama_tujuan" => "$nama",
                    "pesan" => "$pesan",
                    "port" => "$port_gateway"
                );
                $json = json_encode($arr);
                curl_setopt($ch, CURLOPT_URL, "$url_service");
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_TIMEOUT, 3000); 
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $content = curl_exec($ch);
                $err = curl_error($ch);
                curl_close($ch);
                $get =json_decode($content, true);
                echo '<span class="text-success" id="NotifikasiLupaPasswordBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Maaf!! Terjadi kesalahan pada saat menyimpan data kode verifikasi.</span>';
            }
        }
    }
?>