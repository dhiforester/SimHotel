<!-- Navbar Start -->
<div class="container-fluid bg-gelap mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Kategori</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <?php
                        //Menampilkan Data Mitra
                        $QryKategori = mysqli_query($Conn, "SELECT*FROM kategori");
                        while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                            $kategori= $DataKategori['kategori'];
                            echo '<a href="index.php?Page=Produk&Kategori='.$kategori.'" class="nav-item nav-link">'.$kategori.'</a>';
                        }
                    ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-gelap navbar-dark py-3 py-lg-0 px-0">
                <a href="index.php" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-light px-2">
                        <img src="<?php echo $base_url_admin; ?>/assets/img/<?php echo $logo; ?>" width="80px" height="80px">
                        <?php echo "$judul"; ?>
                    </span>
                    <!-- <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span> -->
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link <?php if($Page==""){echo "active";} ?>">Beranda</a>
                        <a href="index.php?Page=Tentang" class="nav-item nav-link <?php if($Page=="Tentang"){echo "active";} ?>">Tentang</a>
                        <a href="index.php?Page=Bantuan" class="nav-item nav-link <?php if($Page=="Bantuan"){echo "active";} ?>">Bantuan</a>
                        <a href="index.php?Page=Faq" class="nav-item nav-link <?php if($Page=="Faq"){echo "active";} ?>">FAQs</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block text-light">
                        <?php 
                            if(!empty($SessionIdPelanggan)){ 
                                $JumlahPesanMasuk= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE id_pelanggan='$SessionIdPelanggan' AND status='Pending' AND (kategori='AdminToPelanggan' OR kategori='MitraToPelanggan')"));
                                $JumlahKeranjangPelanggan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan' AND status_pembayaran='Pending'"));
                                //Transaksi Sudah Selesai dan perlu di reting dan testimoni
                                $JumlahWajibReting=0;
                                $QryTransaksiTesti = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan' AND status_kamar='Checkout'");
                                while ($DataTransaksiTesti = mysqli_fetch_array($QryTransaksiTesti)) {
                                    $IdTransaksi= $DataTransaksiTesti['id_transaksi'];
                                    //Cek apakah sudah ada reting
                                    $JumlahReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_transaksi='$IdTransaksi'"));
                                    if(empty($JumlahReting)){
                                        $JumlahWajibReting=$JumlahWajibReting+1;
                                    }
                                }
                        ?>
                            <a href="index.php?Page=Inbox" class="btn px-0 ml-3">
                                <i class="fas fa-envelope text-light"></i>
                                <?php
                                    if(!empty($JumlahPesanMasuk)){
                                        echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahPesanMasuk.'</span>';
                                    }
                                ?>
                            </a>
                            <a href="index.php?Page=TransaksiReting" class="btn px-0 ml-3" title="Kesempatan Mengisi Testimoni">
                                <i class="fas fa-bell text-light"></i>
                                <?php
                                    if(!empty($JumlahWajibReting)){
                                        echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahWajibReting.'</span>';
                                    }
                                ?>
                            </a>
                            <!-- <a href="index.php?Page=Keranjang" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-light"></i>
                                <?php
                                    if(!empty($JumlahKeranjangPelanggan)){
                                        echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahKeranjangPelanggan.'</span>';
                                    }
                                ?>
                            </a> -->
                            <a href="index.php?Page=Profile" class="btn px-0 ml-3">
                                <img src="<?php echo 'img/Pelanggan/'.$SessionGambar.''; ?>" alt="User Image" width="30px" class="rounded-circle">
                            </a>
                        <?php }else{ ?>
                            <a href="index.php?Page=Login" class="btn px-0 text-light">
                                Masuk/Daftar
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->