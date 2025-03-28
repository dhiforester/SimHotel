<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap data
    if(empty($_POST['id_mitra'])){
        echo '<option value="">Isi Mitra Dulu</option>';
    }else{
        if(empty($_POST['estimasi'])){
            echo '<option value="">Isi Tanggal Booking</option>';
        }else{
            $id_mitra=$_POST['id_mitra'];
            $estimasi=$_POST['estimasi'];
            $day = date('l', strtotime($estimasi));
            if($day=="Monday"){
                $hari="1";
            }
            if($day=="Tuesday"){
                $hari="2";
            }
            if($day=="Wednesday"){
                $hari="3";
            }
            if($day=="Thursday"){
                $hari="4";
            }
            if($day=="Friday"){
                $hari="5";
            }
            if($day=="Saturday"){
                $hari="6";
            }
            if($day=="Sunday"){
                $hari="7";
            }
            //Cari secara distinct hairstylist_jadwal
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT id_hairstylist FROM hairstylist_jadwal WHERE hari='$hari' AND id_mitra='$id_mitra' AND status='Active'"));
            if(empty($jml_data)){
                echo '<option value="">Tidak Ada Jadwal hairstylist</option>';
            }else{
                //Tampilkan data jadwal secara distinct
                $query = mysqli_query($Conn, "SELECT DISTINCT id_hairstylist FROM hairstylist_jadwal WHERE hari='$hari' AND id_mitra='$id_mitra' AND status='Active'");
                while ($data = mysqli_fetch_array($query)) {
                    $id_hairstylist= $data['id_hairstylist'];
                    //Buka namnya
                    $Qry = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
                    $data = mysqli_fetch_array($Qry);
                    $nama= $data['nama'];
                    echo '<option value="'.$id_hairstylist.'">'.$nama.'</option>';
                }
            }
            
        }
    }
?>