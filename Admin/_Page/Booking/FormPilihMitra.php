<div class="row">
    <div class="col-md-12">
        <?php
            include "../../_Config/Connection.php";
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM mitra"));
            if(empty($jml_data)){
                echo "Tidak ada data mitra";
            }else{
                echo '<table class="table table-responsive">';
                $query = mysqli_query($Conn, "SELECT*FROM mitra ORDER BY nama_mitra ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $id_mitra= $data['id_mitra'];
                    $id_akses= $data['id_akses'];
                    $nama_mitra= $data['nama_mitra'];
                    $kontak_mitra= $data['kontak_mitra'];
                    $propinsi_mitra= $data['propinsi_mitra'];
                    $kabupaten_mitra= $data['kabupaten_mitra'];
                    $kecamatan_mitra= $data['kecamatan_mitra'];
                    $desa_mitra= $data['desa_mitra'];
                    $alamat_mitra= $data['alamat_mitra'];
                    $email_mitra= $data['email_mitra'];
                    $owner= $data['owner'];
                    $kontak_owner= $data['kontak_owner'];
                    $kategori_mitra= $data['kategori_mitra'];
                    $status_mitra= $data['status_mitra'];
                    $tanggal_daftar= $data['tanggal_daftar'];
                    $logo= $data['logo'];
                    if(empty($data['logo'])){
                        $url_logo="assets\img\User\No-Image.png";
                    }else{
                        $url_logo="assets/img/Mitra/$logo";
                    }
                    echo '<tr>';
                    echo '  <td><img src="'.$url_logo.'"  alt="'.$nama_mitra.'" class="rounded-circle" width="60px"></td>';
                    echo '  <td><a href="index.php?Page=Booking&id_mitra='.$id_mitra.'"><b>'.$nama_mitra.'</b></a><br>'.$owner.'</td>';
                    echo '  <td>'.$status_mitra.'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        ?>
    </div>
</div>