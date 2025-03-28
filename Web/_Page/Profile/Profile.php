<?php
    //Menghitung Jumlah
    //Jumlah Transaksi
    $JumlahTransaksi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan'"));
    //Jumlah Komentar
    $JumlahKomentar = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni WHERE id_pelanggan='$SessionIdPelanggan'"));
    $JumlahReting = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_pelanggan='$SessionIdPelanggan'"));
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Profile</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Profil Pelanggan</span></h2>
    <div class="row px-xl-5">
        <div class="col-md-3 mb-5">
            <div class="contact-form bg-light p-30">
                <div class="row">
                    <div class="col-md-12">
                        <h4>
                            <?php echo "$SessionNama"; ?>
                        </h4>
                        <small>
                            <?php echo "$SessionEmail"; ?>
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalUbahFoto">
                            <i class="fas fa-image"></i> Ganti Foto
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword">
                            <i class="fas fa-key"></i> Ubah Kata Sandi
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalUbahProfile">
                            <i class="fas fa-user-circle"></i> Ubah Profil
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-dark btn-block" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1" title="Profil Pelanggan">
                        <i class="fas fa-user-circle"></i> Profil
                    </a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2" title="Booking Hotel">
                        <i class="bi bi-ticket"></i> Transaksi (<?php echo $JumlahTransaksi;?>)
                    </a>
                    <!-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3" title="Reting">
                        <i class="bi bi-star"></i> Reting (<?php echo $JumlahReting;?>)
                    </a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-4" title="Testimoni">
                        <i class="bi bi-chat"></i> Komentar(<?php echo $JumlahKomentar;?>)
                    </a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Profil Pelanggan</h4>
                        <p>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>ID.Identitas</b><br>
                                            <?php echo "$SessionNoIdentitas"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Nama Lengkap</b><br>
                                            <?php echo "$SessionNama"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Email</b><br>
                                            <?php echo "$SessionEmail"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Alamat</b><br>
                                            <?php echo "$SessionAlamat"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Kontak</b><br>
                                            <?php echo "$SessionKontak"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Tanggal Daftar</b><br>
                                            <?php echo "$SessionTanggalDaftar"; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Riwayat Transaksi</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            //Menampilkan list transaksi
                                            if(empty($JumlahTransaksi)){
                                                echo '<tr>';
                                                echo '  <td colspan="3" class="text-center text-danger">Belum Ada Transaksi Yang Ditampilan</td>';
                                                echo '</tr>';
                                            }else{
                                                $no=1;
                                                //KONDISI PENGATURAN MASING FILTER
                                                $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan'");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_transaksi= $data['id_transaksi'];
                                                    $tanggal= $data['tanggal'];
                                                    $jumlah= $data['jumlah'];
                                                    //Format tanggal
                                                    $strtotime=strtotime($tanggal);
                                                    $tanggal=date('d/m/Y',$strtotime);
                                                    //Format Rupiah
                                                    $HargaProduk = "Rp " . number_format($jumlah,0,',','.');
                                                    echo '<tr>';
                                                    echo '  <td class="text-left">';
                                                    echo '      <b>ID: :'.$tanggal.'</b><br>';
                                                    echo '      <small>Total : '.$HargaProduk.'</small><br>';
                                                    echo '      <a href="index.php?Page=Booking&Sub=Detail&id_transaksi='.$id_transaksi.'">';
                                                    echo '          Lihat Detail Transaksi';
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
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <h4 class="mb-3">List Favorit</h4>
                        <p></p>
                        <?php
                            //Menampilkan list Favorit
                            if(empty($JumlahFavorit)){
                                echo '<p>';
                                echo '  <span class="text-center text-danger">Belum Ada Barang Favorit Yang Disimpan</span>';
                                echo '</p>';
                            }else{
                                $no=1;
                                //KONDISI PENGATURAN MASING FILTER
                                $query = mysqli_query($Conn, "SELECT*FROM barang_favorit WHERE id_pelanggan='$SessionIdPelanggan'");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_barang_favorit= $data['id_barang_favorit'];
                                    $id_pelanggan= $data['id_pelanggan'];
                                    $id_barang= $data['id_barang'];
                                    $nama_barang= $data['nama_barang'];
                                    //Buka data barang
                                    $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                    $DataBarang = mysqli_fetch_array($QryBarang);
                                    if(empty($DataBarang['id_barang'])){
                                        $foto=''.$base_url_admin.'/assets/img/no_access.webp';
                                        $kategori="";
                                        $harga="Rp 0";
                                    }else{
                                        $foto= $DataBarang['foto'];
                                        $kategori= $DataBarang['kategori'];
                                        $harga= $DataBarang['harga'];
                                        $harga = "Rp " . number_format($harga,0,',','.');
                                        $foto=''.$base_url_admin.'/assets/img/Barang/'.$foto.'';
                                    }
                        ?>
                            <div class="row mb-3 border-1">
                                <div class="col-2">
                                    <img src="<?php echo "$foto";?>" alt="" width="100%">
                                </div>
                                <div class="col-10">
                                    <?php
                                        echo '<a href="index.php?Page=Produk&Sub=Detail&id='.$id_barang.'"><b>'.$nama_barang.'</b></a>';
                                        echo '<br>';
                                        echo '<i>'.$harga.'</i><br>';
                                        echo '<small>'.$kategori.'</small><br>';
                                        $no++;
                                    ?>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-4">
                        <h4 class="mb-3">Komentar</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <b>No</b>
                                            </th>
                                            <th class="text-center">
                                                <b>Produk</b>
                                            </th>
                                            <th class="text-center">
                                                <b>Komentar</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //Menampilkan list komentar
                                            if(empty($JumlahKomentar)){
                                                echo '<tr>';
                                                echo '  <td colspan="3" class="text-center text-danger">Belum Ada Komentar Yang Ditampilkan</td>';
                                                echo '</tr>';
                                            }else{
                                                $no=1;
                                                //Menampilkan komentar produk
                                                $query = mysqli_query($Conn, "SELECT*FROM barang_komentar WHERE id_pelanggan='$SessionIdPelanggan'");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_barang= $data['id_barang'];
                                                    $tanggal= $data['tanggal'];
                                                    $komentar= $data['komentar'];
                                                    $balas= $data['balas'];
                                                    //Buka data barang
                                                    $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                                    $DataBarang = mysqli_fetch_array($QryBarang);
                                                    if(empty($DataBarang['id_barang'])){
                                                        $NamaBarang="None";
                                                    }else{
                                                        $NamaBarang= $DataBarang['nama'];
                                                    }
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$no.'</td>';
                                                    echo '  <td class="text-left">'.$NamaBarang.'</td>';
                                                    echo '  <td class="text-left">'.$komentar.'</td>';
                                                    echo '</tr>';
                                                    $no++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->