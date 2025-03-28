<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_pelanggan'])){
        echo '<span class="text-danger">ID Pelanggan Tidak Boleh Kosong!</span>';
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
        $JumlahChat=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM chating WHERE id_pelanggan='$id_pelanggan' AND (kategori='PelangganToMitra' OR kategori='MitraToPelanggan') AND (idAksesMitra='$SessionIdMitra')"));
        if(empty($JumlahChat)){
            echo '<span class="text-danger">Belum ada chat dengan pelanggan  tersebut!</span>';
        }else{
            $query = mysqli_query($Conn, "SELECT * FROM chating WHERE id_pelanggan='$id_pelanggan' AND (kategori='PelangganToMitra' OR kategori='MitraToPelanggan') AND (idAksesMitra='$SessionIdMitra') ORDER BY id_chating ASC");
            while ($data = mysqli_fetch_array($query)) {
                $id_chating= $data['id_chating'];
                $kategori= $data['kategori'];
                $tanggal= $data['tanggal'];
                $pesan= $data['pesan'];
                $status= $data['status'];
                //Buka Nama Pelanggan
                $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
                $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
                if(!empty($Datapelanggan['nama'])){
                    $nama= $Datapelanggan['nama'];
                }else{
                    $nama="None";
                }
                if($kategori=="PelangganToMitra"){
                    //Ubah Status Menjadi Dibaca
                    $UpdateStatus = mysqli_query($Conn,"UPDATE chating SET 
                        status='Dibaca'
                    WHERE id_chating='$id_chating'") or die(mysqli_error($Conn)); 
                    if($UpdateStatus){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo '  <b>'.$nama.'</b><br>';
                        echo '  <small>'.$tanggal.'</small><br>';
                        echo '  <h3>'.$pesan.'</h3><br>';
                        echo '  <small>'.$status.'</small><br>';
                        echo '</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo '  <b>Update Gagal</b><br>';
                    }
                }else{
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                    echo '  <b>Admin</b><br>';
                    echo '  <small>'.$tanggal.'</small><br>';
                    echo '  <h3>'.$pesan.'</h3><br>';
                    echo '  <small>'.$status.'</small><br>';
                    echo '</div>';
                }
            }
        }
    }
?>