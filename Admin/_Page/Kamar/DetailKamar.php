<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_dokter
    if(empty($_GET['id'])){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Kamar</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Silahkan Kembali Ke Halaman Sebelumnya';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_kamar=$_GET['id'];
        //Buka data kamar
        $Qry = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_kamar'")or die(mysqli_error($Conn));
        $data = mysqli_fetch_array($Qry);
        $id_kamar= $data['id_kamar'];
        $id_kategori= $data['id_kategori'];
        $kategori= $data['kategori'];
        $harga= $data['harga'];
        $deskripsi= $data['deskripsi'];
        $nama_kamar= $data['nama_kamar'];
        $foto=$data['foto'];
        $UrlFoto="assets/img/kamar/$foto";
        $harga = "Rp " . number_format($harga,0,',','.');
?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <b class="card-title">
                        <i class="bi bi-buildings"></i> Detail Kamar
                    </b>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=Kamar" class="btn btn-md btn-dark btn-rounded btn-block">
                        <i class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-2"> 
                <div class="col-md-3">
                    <img src="<?php echo "$UrlFoto"; ?>" alt="" width="80%">
                </div>
                <div class="col-md-9">
                    <div class="row mt-2"> 
                        <div class="col-md-12"><b>Nama Kamar</b><br><?php echo "$nama_kamar"; ?></div>
                    </div>
                    <div class="row mt-2"> 
                        <div class="col-md-12"><b>Kategori Kamar :</b><br><?php echo "$kategori"; ?></div>
                    </div>
                    <div class="row mt-2"> 
                        <div class="col-md-12"><b>Harga/Malam :</b><br><?php echo "$harga"; ?></div>
                    </div>
                    <div class="row mt-2"> 
                        <div class="col-md-12"><b>Deskripsi :</b><br><?php echo "$deskripsi"; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-9">
            <b class="card-title">
                <i class="bi bi-calendar"></i> Sarana & Fasilitas Kamar
            </b>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-md btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahInformasiKamar" data-id="<?php echo "$id_kamar"; ?>" title="Tambah Informasi">
                <i class="bi bi-plus-circle"></i> Tambah Informasi
            </button>
        </div>
    </div> -->
    <!-- <div class="row">
        <?php
            $query = mysqli_query($Conn, "SELECT*FROM kamar_foto WHERE id_kamar='$id_kamar'");
            while ($data = mysqli_fetch_array($query)) {
                $id_kamar_foto= $data['id_kamar_foto'];
                $TitleInformasi= $data['judul'];
                $DeskripsiLainnya= $data['deskripsi'];
                $FotoKamar= $data['foto'];
        ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?php echo "assets/img/kamar/$foto";?>" alt="<?php echo $nama;?>" class="card-img-top">
                    <div class="card-body profile-card pt-4 d-flex flex-column">
                        <div class="row">
                            <div class="col-md-12 mt-3 text-center">
                                <a href="index.php?Page=Kamar&Sub=DetailKamar&id=<?php echo "$id_kamar"; ?>" title="Lihat Detail">
                                    <?php 
                                        echo "<b>$nama_kamar</b>";
                                    ?>
                                </a><br>
                                <small>
                                    <?php 
                                        echo "<i>$kategori</i>";
                                    ?>
                                </small>
                                <h3><?php echo $harga;?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditKamar" data-id="<?php echo "$id_kamar,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Ubah Informasi Kamar">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>  
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusKamar" data-id="<?php echo "$id_kamar,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Kamar">
                                        <i class="bi bi-x"></i> Hapus
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div> -->
    
<?php } ?>