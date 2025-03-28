<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Tangkap data
    if(empty($_POST['id_mitra'])){
        echo '<option value="">Isi Mitra Dulu</option>';
    }else{
        if(empty($_POST['estimasi'])){
            echo '<option value="">Isi Tanggal Booking</option>';
        }else{
            if(empty($_POST['id_hairstylist'])){
                echo '<option value="">Isi hairstylist Dulu</option>';
            }else{
                $id_mitra=$_POST['id_mitra'];
                $estimasi=$_POST['estimasi'];
                $id_hairstylist=$_POST['id_hairstylist'];
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM hairstylist_jadwal WHERE hari='$hari' AND id_mitra='$id_mitra' AND id_hairstylist='$id_hairstylist' AND status='Active'"));
                if(empty($jml_data)){
                    echo '<option value="">Tidak Ada Jadwal hairstylist</option>';
                }else{
                    //Tampilkan data jadwal secara distinct
                    $query = mysqli_query($Conn, "SELECT * FROM hairstylist_jadwal WHERE hari='$hari' AND id_mitra='$id_mitra' AND id_hairstylist='$id_hairstylist' AND status='Active'");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_hairstylist_jadwal= $data['id_hairstylist_jadwal'];
                        $jam_mulai= $data['jam_mulai'];
                        $jam_selesai= $data['jam_selesai'];
                        $jam_mulai= date('H:i', $jam_mulai);
                        $jam_selesai= date('H:i', $jam_selesai);
                        echo '<option value="'.$id_hairstylist_jadwal.'">'.$jam_mulai.' s/d '.$jam_selesai.'</option>';
                    }
                }
            }
        }
    }
?>