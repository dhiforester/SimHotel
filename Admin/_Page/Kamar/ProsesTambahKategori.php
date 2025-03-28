<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    $datetime=strtotime($now);
    //Validasi NamaKategori tidak boleh kosong
    if(empty($_POST['NamaKategori'])){
        echo '<small class="text-danger">Nama Kategori Tidak Boleh Kosong</small>';
    }else{
        //Validasi Foto tidak boleh kosong
        if(empty($_FILES['FotoKategori']['name'])){
            echo '<small class="text-danger">Foto Kategori Tidak Boleh Kosong</small>';
        }else{
            $kategori=$_POST['NamaKategori'];
            $ValidasiKategori=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM kategori WHERE kategori='$kategori'"));
            if(!empty($ValidasiKategori)){
                echo '<small class="text-danger">Data Tersebut Sudah Ada</small>';
            }else{
                //nama gambar
                $nama_gambar=$_FILES['FotoKategori']['name'];
                //ukuran gambar
                $ukuran_gambar = $_FILES['FotoKategori']['size']; 
                //tipe
                $tipe_gambar = $_FILES['FotoKategori']['type']; 
                //sumber gambar
                $tmp_gambar = $_FILES['FotoKategori']['tmp_name'];
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
                    $entry="INSERT INTO kategori (
                        kategori,
                        foto
                    ) VALUES (
                        '$kategori',
                        '$namabaru'
                    )";
                    $Input=mysqli_query($Conn, $entry);
                    if($Input){
                        echo '<small class="text-success" id="NotifikasiTambahKategoriBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data </small>';
                    }
                }
            }
        }
    }
?>