<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    $datetime=strtotime($now);
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
                echo '<small class="text-danger">Harga Kamar Tidak Boleh Kosong</small>';
            }else{
                //Validasi deskripsi tidak boleh kosong
                if(empty($_POST['deskripsi'])){
                    echo '<small class="text-danger">Deskripsi Tidak Boleh Kosong</small>';
                }else{
                    if(empty($_FILES['foto']['name'])){
                        echo '<small class="text-danger">Foto Kamar Tidak Boleh Kosong</small>';
                    }else{
                        $id_kategori=$_POST['id_kategori'];
                        $nama_kamar=$_POST['nama_kamar'];
                        $harga=$_POST['harga'];
                        $deskripsi=$_POST['deskripsi'];
                        $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM kamar WHERE nama_kamar='$nama_kamar' AND id_kategori='$id_kategori' AND deskripsi='$deskripsi'"));
                        if(!empty($ValidasiDuplikat)){
                            echo '<small class="text-danger">Data Tersebut Sudah Ada</small>';
                        }else{
                            //buka kategori
                            $Qry = mysqli_query($Conn,"SELECT * FROM kategori WHERE id_kategori='$id_kategori'")or die(mysqli_error($Conn));
                            $data = mysqli_fetch_array($Qry);
                            $kategori= $data['kategori'];
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
                                        $ValidasiGambar="Valid";
                                    }else{
                                        $ValidasiGambar="Image upload failed";
                                    }
                                }else{
                                    $ValidasiGambar="File size cannot be more than 2 Mb";
                                }
                            }else{
                                $ValidasiGambar="File Types Can Only JPG, JPEG, PNG and GIF";
                            }
                            //Apabila validasi upload valid maka simpan di database
                            if($ValidasiGambar!=="Valid"){
                                echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                            }else{
                                $entry="INSERT INTO kamar (
                                    id_kategori,
                                    kategori,
                                    nama_kamar,
                                    deskripsi,
                                    harga,
                                    foto
                                ) VALUES (
                                    '$id_kategori',
                                    '$kategori',
                                    '$nama_kamar',
                                    '$deskripsi',
                                    '$harga',
                                    '$namabaru'
                                )";
                                $Input=mysqli_query($Conn, $entry);
                                if($Input){
                                    $_SESSION ["NotifikasiSwal"]="Tambah Kamar Berhasil";
                                    echo '<small class="text-success" id="NotifikasiTambahKamarBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data </small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>