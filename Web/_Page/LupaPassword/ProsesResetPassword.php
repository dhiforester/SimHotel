<?php
    //Koneksi
    session_start();
    include "../../_Config/Connection.php";
    //Inisiasi tanggal sekarang
    date_default_timezone_set("Asia/Jakarta");
    $now=date('Y-m-d H:i:s');
    $tanggal_sekarang=date('Y-m-d H:i:s');
    $tanggal_sekarang=strtotime($tanggal_sekarang);
    //menangkap data dari link
    if(empty($_POST['email'])){
        echo '<small class="text-center text-danger">Email Tidak Boleh Kosong.</small>';
    }else{
        if(empty($_POST['token'])){
            echo '<small class="text-center text-danger">Kode Verifikasi Tidak Boleh Kosong.</small>';
        }else{
            $email=$_POST['email'];
            $token=$_POST['token'];
            //Validasi email pda data pelanggan
            $Qry=mysqli_query($Conn,"SELECT*FROM pelanggan WHERE email='$email' AND token='$token'")or die(mysqli_error($Conn));
            $DataPelanggan = mysqli_fetch_array($Qry);
            if(empty($DataPelanggan["id_pelanggan"])){
                echo '<small class="text-center text-danger">Email dan kode verifikasi yang anda gunakan tidak valid.</small>';
            }else{
                $id_pelanggan=$DataPelanggan["id_pelanggan"];
                if(empty($_POST['password1'])){
                    echo '<small class="text-center text-danger">Password Baru Tidak Boleh Kosong.</small>';
                }else{
                    if(empty($_POST['password2'])){
                        echo '<small class="text-center text-danger">Password Yang Anda Gunakan Tidak Sama.</small>';
                    }else{
                        $JumlahKarakterPassword=strlen($_POST['password1']);
                        if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password1'])){
                            echo '<small class="text-danger">Password Hanya Boleh Terdiri dari 6-20 karakter huruf dan angka</small>';
                        }else{
                            if($_POST['password1']!==$_POST['password2']){
                                echo '<small class="text-danger">Password Tidak sama</small>';
                            }else{
                                $password1=$_POST['password1'];
                                $password1=md5($password1);
                                //Simpan data password baru
                                $UpdatePelanggan = mysqli_query($Conn,"UPDATE pelanggan SET 
                                    password='$password1',
                                    token='0',
                                    datetime_update='$now'
                                WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn)); 
                                if($UpdatePelanggan){
                                    $_SESSION ["NotifikasiSwal"]="Edit Password Berhasil";
                                    echo '<small class="text-success" id="NotifikasiResetPasswordBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>