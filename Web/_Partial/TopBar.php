<!-- Topbar Start -->
<?php
    //Menangkap Page
    if(empty($_GET['Page'])){
        $Page="";
    }else{
        $Page=$_GET['Page'];
    }
    if(empty($_GET['id'])){
        $id="";
    }else{
        $id=$_GET['id'];
    }
    if($Page=="Tentang"){
        $TopText="";
    }
?>
<div class="container-fluid">
    <div class="row bg-gelap py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100 text-light">
                <a class="<?php if($Page==""){echo "text-primary";}else{echo "text-light";} ?> mr-3" href="index.php">Beranda</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center d-block d-lg-none">
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
                    <a href="index.php?Page=TransaksiReting" class="btn px-0 ml-3">
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
                                echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahPesanMasuk.'</span>';
                            }
                        ?>
                    </a> -->
                    <a href="index.php?Page=Profile" class="btn px-0 ml-3">
                        <img src="<?php echo 'img/Pelanggan/'.$SessionGambar.''; ?>" alt="User Image" width="30px" class="rounded-circle">
                    </a>
                <?php }else{ ?>
                    <a href="index.php?Page=Login" class="btn btn-sm btn-primary w-100 mt-3">
                        Masuk/Daftar
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-8">
            <a href="" class="text-decoration-none">
                <!-- <img src="<?php echo $base_url_admin; ?>/assets/img/<?php echo $logo; ?>" width="70px" height="70px"> -->
                <span class="h1 text-dark px-2"><?php echo "$judul"; ?></span><br>
                <small class="text-dark px-2"><?php echo "$alamat"; ?></small>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Layanan Pelanggan</p>
            <h5 class="m-0"><?php echo "$kontak"; ?></h5>
        </div>
    </div>
</div>
<!-- Topbar End -->