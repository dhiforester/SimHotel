<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap data
    if(empty($_POST['id_mitra'])){
        echo 'Isi data mitra terlebih dulu untuk memilih layanan';
    }else{
        $id_mitra=$_POST['id_mitra'];
        //Cari secara distinct hairstylist_jadwal
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM mitra_layanan WHERE id_mitra='$id_mitra'"));
        if(empty($jml_data)){
            echo 'Mitra yang anda pilih belum memiliki layanan';
        }else{
            //Tampilkan data layanan secara distinct
            $query = mysqli_query($Conn, "SELECT * FROM mitra_layanan WHERE id_mitra='$id_mitra'");
            while ($data = mysqli_fetch_array($query)) {
                $id_mitra_layanan= $data['id_mitra_layanan'];
                $id_layanan= $data['id_layanan'];
                $keterangan= $data['keterangan'];
                $harga= $data['harga'];
                $hasil_rupiah = "Rp " . number_format($harga,0,',','.');
                //Buka namnya
                $Qry = mysqli_query($Conn,"SELECT * FROM layanan WHERE id_layanan='$id_layanan'")or die(mysqli_error($Conn));
                $DataLayanan = mysqli_fetch_array($Qry);
                $nama_layanan= $DataLayanan['nama_layanan'];
                echo '<div class="form-check">';
                echo '  <input class="form-check-input" type="checkbox" name="id_mitra_layanan[]" id="id_mitra_layanan'.$id_mitra_layanan.'"" value="'.$id_mitra_layanan.'">';
                echo '  <label class="form-check-label" for="id_mitra_layanan'.$id_mitra_layanan.'""> ';
                echo '      '.$nama_layanan.' - '.$keterangan.' ('.$hasil_rupiah.')';
                echo '  </label>';
                echo '</div>';
            }
        }
    }
?>