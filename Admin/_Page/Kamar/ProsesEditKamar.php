<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d');
    $datetime=strtotime($now);
    //Validasi id_kamar tidak boleh kosong
    if(empty($_POST['id_kamar'])){
        echo '<small class="text-danger">ID Kamar Tidak Boleh Kosong</small>';
    }else{
        //Validasi id_kategori tidak boleh kosong
        if(empty($_POST['id_kategori'])){
            echo '<small class="text-danger">ID Kategori Tidak Boleh Kosong</small>';
        }else{
            //Validasi nama_kamar tidak boleh kosong
            if(empty($_POST['nama_kamar'])){
                echo '<small class="text-danger">Nama Kamar Tidak Boleh Kosong</small>';
            }else{
                //Validasi harga tidak boleh kosong
                if(empty($_POST['harga'])){
                    echo '<small class="text-danger">Harga Tidak Boleh Kosong</small>';
                }else{
                    //Validasi deskripsi tidak boleh kosong
                    if(empty($_POST['deskripsi'])){
                        echo '<small class="text-danger">Deskripsi Tidak Boleh Kosong</small>';
                    }else{
                        $id_kamar=$_POST['id_kamar'];
                        $id_kategori=$_POST['id_kategori'];
                        $nama_kamar=$_POST['nama_kamar'];
                        $harga=$_POST['harga'];
                        $deskripsi=$_POST['deskripsi'];
                        if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['harga'])){
                            echo '<small class="text-danger">Harga Hanya Boleh Diisi Angka</small>';
                        }else{
                            //buka kategori
                            $Qry = mysqli_query($Conn,"SELECT * FROM kategori WHERE id_kategori='$id_kategori'")or die(mysqli_error($Conn));
                            $data = mysqli_fetch_array($Qry);
                            $kategori= $data['kategori'];
                            //Update Kamar
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
                                $path = "../../assets/img/kamar/".$namabaru;
                                if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                    if($ukuran_gambar<2000000){
                                        if(move_uploaded_file($tmp_gambar, $path)){
                                            $UpdateKamar = mysqli_query($Conn,"UPDATE kamar SET 
                                                id_kategori='$id_kategori',
                                                kategori='$kategori',
                                                nama_kamar='$nama_kamar',
                                                deskripsi='$deskripsi',
                                                harga='$harga',
                                                foto='$namabaru'
                                            WHERE id_kamar='$id_kamar'") or die(mysqli_error($Conn)); 
                                            if($UpdateKamar){
                                                echo '<small class="text-success" id="NotifikasiEditKamarBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat melakukan update data</small>';
                                            }
                                        }else{
                                            $ValidasiGambar="Upload file gagal";
                                            echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                        }
                                    }else{
                                        $ValidasiGambar="File tidak boleh lebih dari 2 Mb";
                                        echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                    }
                                }else{
                                    $ValidasiGambar="Tipe File Foto Hanya Boleh JPG, JPEG, PNG and GIF";
                                    echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                }
                            }else{
                                $UpdateKamar = mysqli_query($Conn,"UPDATE kamar SET 
                                    id_kategori='$id_kategori',
                                    kategori='$kategori',
                                    nama_kamar='$nama_kamar',
                                    deskripsi='$deskripsi',
                                    harga='$harga'
                                WHERE id_kamar='$id_kamar'") or die(mysqli_error($Conn)); 
                                if($UpdateKamar){
                                    echo '<small class="text-success" id="NotifikasiEditKamarBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat melakukan update data</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>