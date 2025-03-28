<?php
    //Menangkap ID Mitra
    if(empty($_GET['id_mitra'])){
        $id_mitra="";
    }else{
        $id_mitra=$_GET['id_mitra'];
    }
    //Membuka Data Mitra
    $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
    $DataMitra = mysqli_fetch_array($QryMitra);
    $nama_mitra= $DataMitra['nama_mitra'];
    $id_wilayah= $DataMitra['id_wilayah'];
    $kontak_mitra= $DataMitra['kontak_mitra'];
    $propinsi_mitra= $DataMitra['propinsi_mitra'];
    $kabupaten_mitra= $DataMitra['kabupaten_mitra'];
    $kecamatan_mitra= $DataMitra['kecamatan_mitra'];
    $desa_mitra= $DataMitra['desa_mitra'];
    $alamat_mitra= $DataMitra['alamat_mitra'];
    $email_mitra= $DataMitra['email_mitra'];
    $owner= $DataMitra['owner'];
    $kontak_owner= $DataMitra['kontak_owner'];
    $kategori_mitra= $DataMitra['kategori_mitra'];
    $status_mitra= $DataMitra['status_mitra'];
    $tanggal_daftar= $DataMitra['tanggal_daftar'];
    $logo= $DataMitra['logo'];
    if(!empty($DataMitra['map'])){
        $MapMitra= $DataMitra['map'];
    }else{
        $MapMitra="";
    }
    
    //Jumlah Layanan Yang Tersedia
    $JumlahLayanan=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_mitra='$id_mitra'"));
    //Jumlah Hairstylist
    $JumlahHairstylist=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM hairstylist WHERE id_mitra='$id_mitra'"));
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <a class="breadcrumb-item text-dark" href="index.php?Page=Mitra">Mitra</a>
                <span class="breadcrumb-item active">Detail Mitra</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3"><?php echo "$nama_mitra"; ?></span>
    </h2>
    <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <h4 class="mb-3">Info Mitra</h4>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <img src="<?php echo "$base_url_admin/assets/img/Mitra/$logo"; ?>" alt="" width="100%"><br>
                        <button type="button" class="btn btn-md btn-primary btn-block mt-4" data-bs-toggle="modal" data-bs-target="#ModalChatMitra" data-id="<?php echo "$id_mitra"; ?>">
                            <i class="bi bi-chat-dots"></i> Chat
                        </button>
                    </div>
                    <div class="col-md-3 table table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Nama Mitra :</b><br>
                                        <?php echo "$nama_mitra"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Kontak Mitra :</b><br>
                                        <?php echo "$kontak_mitra"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Alamat :</b><br>
                                        <?php echo "$alamat_mitra"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Emial Mitra :</b><br>
                                        <?php echo "$email_mitra"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Pemilik Usaha :</b><br>
                                        <?php echo "$owner"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Kategori :</b><br>
                                        <?php echo "$kategori_mitra"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <?php echo "$MapMitra"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <table class="table">
                    <tbody>
                        <?php
                            //Menampilkan list Mitra
                            if(empty($JumlahLayanan)){
                                echo '<tr>';
                                echo '  <td colspan="3" class="text-center text-danger">Belum Ada Mitra Yang Menyeediakan Layanan Ini</td>';
                                echo '</tr>';
                            }else{
                                $no=1;
                                //KONDISI PENGATURAN MASING FILTER
                                $query = mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_mitra='$id_mitra'");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_mitra_layanan= $data['id_mitra_layanan'];
                                    $id_layanan= $data['id_layanan'];
                                    $id_mitra= $data['id_mitra'];
                                    $keterangan= $data['keterangan'];
                                    $harga= $data['harga'];
                                    //Format Rupiah
                                    $HargaLayanan = "Rp " . number_format($harga,0,',','.');
                                    //Buka data layanan
                                    $QryLayanan = mysqli_query($Conn,"SELECT * FROM layanan WHERE id_layanan='$id_layanan'")or die(mysqli_error($Conn));
                                    $DataLayanan = mysqli_fetch_array($QryLayanan);
                                    if(empty($DataLayanan['id_layanan'])){
                                        $NamaLayanan='<span class="text-danger">None</span>';
                                        $foto='';
                                        $deskripsi_layanan='';
                                    }else{
                                        $NamaLayanan= $DataLayanan['nama_layanan'];
                                        $foto= $DataLayanan['foto'];
                                        $deskripsi_layanan= $DataLayanan['deskripsi'];
                                    }
                                    echo '<tr>';
                                    echo '  <td>';
                                    echo '      <img src="'.$base_url_admin.'/assets/img/Layanan/'.$foto.'" alt="" width="100px">';
                                    echo '  </td>';
                                    echo '  <td class="text-left">';
                                    echo '      <b>'.$NamaLayanan.'</b><br>';
                                    echo '      '.$HargaLayanan.'<br>';
                                    echo '      <small>'.$deskripsi_layanan.'</small><br>';
                                    echo '      <a href="index.php?Page=Booking&id_layanan='.$id_layanan.'&id_mitra='.$id_mitra.'&id_mitra_layanan='.$id_mitra_layanan.'">';
                                    echo '          Booking Sekarang';
                                    echo '      </a>';
                                    echo '  </td>';
                                    echo '</tr>';
                                    $no++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
    <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <h4 class="mb-3">Hairstylist</h4>
                <p></p>
                <?php
                    //Menampilkan list Mitra
                    if(empty($JumlahHairstylist)){
                        echo '<div class="row">';
                        echo '  <div class="col-md-12 text-center text-danger">Belum Ada Mitra Yang Menyeediakan Layanan Ini</div>';
                        echo '</div>';
                    }else{
                        echo '<div class="row">';
                        $QryHairstylist = mysqli_query($Conn, "SELECT*FROM hairstylist WHERE id_mitra='$id_mitra'");
                        while ($DataHairstylist = mysqli_fetch_array($QryHairstylist)) {
                            $id_hairstylist= $DataHairstylist['id_hairstylist'];
                            $nama= $DataHairstylist['nama'];
                            $foto= $DataHairstylist['foto'];
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a class="text-decoration-none" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailHairstylist" data-id="<?php echo "$id_hairstylist"; ?>">
                            <div class="cat-item d-flex align-items-center mb-4">
                                <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                    <img class="img-fluid" src="<?php echo "$base_url_admin/assets/img/Hairstylist/$foto"; ?>" alt="">
                                </div>
                                <div class="flex-fill pl-3">
                                    <h6><?php echo "$nama"; ?></h6>
                                    <small class="text-body"><?php echo "$nama_mitra"; ?></small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                        }
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->