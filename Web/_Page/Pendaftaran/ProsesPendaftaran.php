<?php
    //Koneksi
    session_start();
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
     //Validasi nama tidak boleh kosong
    if(empty($_POST['nama'])){
        echo '<small class="text-danger">Nama tidak boleh kosong</small>';
    }else{
        //Validasi kontak tidak boleh kosong
        if(empty($_POST['kontak'])){
            echo '<small class="text-danger">Kontak tidak boleh kosong</small>';
        }else{
            //Validasi email tidak boleh kosong
            if(empty($_POST['email'])){
                echo '<small class="text-danger">Email tidak boleh kosong</small>';
            }else{
                //Validasi password1 tidak boleh kosong
                if(empty($_POST['password1'])){
                    echo '<small class="text-danger">Password tidak boleh kosong</small>';
                }else{
                    //Validasi password2 tidak boleh kosong
                    if(empty($_POST['password2'])){
                        echo '<small class="text-danger">Password tidak boleh kosong</small>';
                    }else{
                        //Validasi Regency tidak boleh kosong
                        if($_POST['password1']!==$_POST['password2']){
                            echo '<small class="text-danger">Password Tidak sama</small>';
                        }else{
                            //Validasi no_identitas tidak boleh kosong
                            if(empty($_POST['no_identitas'])){
                                echo '<small class="text-danger">ID Pelanggan tidak boleh kosong</small>';
                            }else{
                                //Variabel
                                $no_identitas=$_POST['no_identitas'];
                                $nama=$_POST['nama'];
                                $kontak=$_POST['kontak'];
                                $email=$_POST['email'];
                                $password1=$_POST['password1'];
                                $password1=MD5($password1);
                                $JumlahKontak=strlen($kontak);
                                //Validasi kontak tidak boleh lebih dari 20 karakter
                                if($JumlahKontak>20||$JumlahKontak<6||!preg_match("/^[0-9]*$/", $kontak)){
                                    echo '<small class="text-danger">Kontak perusahaan hanya boleh terdiri dari 6-20 karakter</small>';
                                }else{
                                    //Validasi kontak tidak boleh duplikat pada database
                                    $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan WHERE kontak='$kontak'"));
                                    if(!empty($ValidasiKontakDuplikat)){
                                        echo '<small class="text-danger">Kontak yang anda gunakan sudah terdaftar</small>';
                                    }else{
                                        //Validasi email tidak boleh duplikat pada database
                                        $ValidasiEmail=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan WHERE email='$email'"));
                                        if(!empty($ValidasiEmail)){
                                            echo '<small class="text-danger">Email pemilik sudah terdaftar</small>';
                                        }else{
                                            //membuat token validasi
                                            $token=rand(10000000, 99999999);
                                            //Simpan Data Pelanggan
                                            $EntryPelanggan="INSERT INTO pelanggan (
                                                tanggal_daftar,
                                                nama,
                                                kontak,
                                                no_identitas,
                                                alamat,
                                                email,
                                                password,
                                                foto
                                            ) VALUES (
                                                '$now',
                                                '$nama',
                                                '$kontak',
                                                '$no_identitas',
                                                '',
                                                '$email',
                                                '$password1',
                                                ''
                                            )";
                                            $InputPelanggan=mysqli_query($Conn, $EntryPelanggan);
                                            if($InputPelanggan){
                                                $_SESSION ["NotifikasiSwal"]="Pendaftaran Berhasil";
                                                echo 'Proses: <small class="text-success" id="NotifikasiPendaftaranBerhasil">Success</small><br>';
                                                echo 'Url: <small class="text-success" id="UrlValidasi">"index.php"</small><br>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data pelanggan</small>';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>