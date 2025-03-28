<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Id Akses
    if(empty($_POST['id_akses'])){
        echo '<small class="text-danger">ID Akses tidak boleh kosong</small>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $kontak_akses_lama= $DataDetailAkses['kontak'];
        $email_akses_lama = $DataDetailAkses['email'];
        $foto_lama = $DataDetailAkses['foto'];
        //Validasi Akses
        if(empty($_POST['akses'])){
            echo '<small class="text-danger">Akses tidak boleh kosong</small>';
        }else{
            //Validasi nama tidak boleh kosong
            if(empty($_POST['nama'])){
                echo '<small class="text-danger">Nama tidak boleh kosong</small>';
            }else{
                //Validasi kontak tidak boleh kosong
                if(empty($_POST['kontak'])){
                    echo '<small class="text-danger">Kontak tidak boleh kosong</small>';
                }else{
                    //Validasi kontak tidak boleh lebih dari 20 karakter
                    $JumlahKarakterKontak=strlen($_POST['kontak']);
                    if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak'])){
                        echo '<small class="text-danger">Kontak hanya boleh terdiri dari 6-20 karakter numerik</small>';
                    }else{
                        //Validasi kontak tidak boleh duplikat
                        $kontak=$_POST['kontak'];
                        if($kontak_akses_lama==$kontak){
                            $ValidasiKontakDuplikat=0;
                        }else{
                            $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE kontak='$kontak'"));
                        }
                        if(!empty($ValidasiKontakDuplikat)){
                            echo '<small class="text-danger">Nomor kontak sudah terdaftar</small>';
                        }else{
                            //Validasi email tidak boleh kosong
                            if(empty($_POST['email'])){
                                echo '<small class="text-danger">Email tidak boleh kosong</small>';
                            }else{
                                //Validasi email duplikat
                                $email=$_POST['email'];
                                if($email_akses_lama==$email){
                                    $ValidasiEmailDuplikat=0;
                                }else{
                                    $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email'"));
                                }
                                if(!empty($ValidasiEmailDuplikat)){
                                    echo '<small class="text-danger">Email yang anda gunakan sudah terdaftar</small>';
                                }else{
                                    //Variabel Lainnya
                                    $nama=$_POST['nama'];
                                    $kontak=$_POST['kontak'];
                                    $email=$_POST['email'];
                                    $akses=$_POST['akses'];
                                    //Validasi Gambar
                                    if(!empty($_FILES['foto']['name'])){
                                        //nama gambar
                                        $nama_gambar=$_FILES['foto']['name'];
                                        //ukuran gambar
                                        $ukuran_gambar = $_FILES['foto']['size']; 
                                        //tipe
                                        $tipe_gambar = $_FILES['foto']['type']; 
                                        //sumber gambar
                                        $tmp_gambar = $_FILES['foto']['tmp_name'];
                                        $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                                        $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                        $FileNameRand=$key;
                                        $Pecah = explode("." , $nama_gambar);
                                        $BiasanyaNama=$Pecah[0];
                                        $Ext=$Pecah[1];
                                        $namabaru = "$FileNameRand.$Ext";
                                        $path = "../../assets/img/akses/".$namabaru;
                                        if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                            if($ukuran_gambar<2000000){
                                                if(move_uploaded_file($tmp_gambar, $path)){
                                                    $ValidasiGambar="Valid";
                                                }else{
                                                    $ValidasiGambar="Upload gambar gagal";
                                                }
                                            }else{
                                                $ValidasiGambar="File gambar tidak boleh lebih dari 2 Mb";
                                            }
                                        }else{
                                            $ValidasiGambar="tipe file hanya boleh JPG, JPEG, PNG and GIF";
                                        }
                                    }else{
                                        $ValidasiGambar="Valid";
                                        $namabaru="";
                                    }
                                    //Apabila validasi upload valid maka simpan di database
                                    if($ValidasiGambar!=="Valid"){
                                        echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                    }else{
                                        if(!empty($_FILES['foto']['name'])){
                                            $foto=$namabaru;
                                        }else{
                                            $foto=$foto_lama;
                                        }
                                        $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                            nama='$nama',
                                            kontak='$kontak',
                                            email='$email',
                                            akses='$akses',
                                            foto='$foto'
                                        WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                                        if($UpdateAkses){
                                            echo '<small class="text-success" id="NotifikasiEditAksesBerhasil">Success</small>';
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
        }
    }
?>