<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Layanan</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">List Layanan</span>
    </h2>
</div>

<div class="container-fluid">
    <div class="row px-xl-5">
        <?php
            //Menampilkan Layanan
            $query = mysqli_query($Conn, "SELECT*FROM layanan ORDER BY nama_layanan ASC");
            while ($data = mysqli_fetch_array($query)) {
                $id_layanan= $data['id_layanan'];
                $nama_layanan= $data['nama_layanan'];
                $foto= $data['foto'];
        ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="<?php echo "$base_url_admin/assets/img/Layanan/$foto"; ?>" alt="">
                    <div class="offer-text">
                        <h4 class="text-white mb-3"><?php echo "$nama_layanan"; ?></h3>
                        <a href="index.php?Page=Layanan&Sub=Detail&id_layanan=<?php echo "$id_layanan"; ?>" class="btn btn-primary">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
