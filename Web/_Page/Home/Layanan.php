<!-- Vendor Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <a href="index.php?Page=Kamar">
            <span class="bg-secondary text-dark pr-3">Kategori/Kelas Kamar</span>
        </a>
    </h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <?php
                    //Menampilkan Mitra
                    $query = mysqli_query($Conn, "SELECT*FROM kategori ORDER BY kategori ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_kategori= $data['id_kategori'];
                        $kategori= $data['kategori'];
                        $foto= $data['foto'];
                ?>
                    <div class="card border-0">
                        <img src="<?php echo "$base_url_admin/assets/img/kamar/$foto"; ?>" alt="<?php echo "$id_kategori" ?>" class="card-img-body">
                        <div class="card-body text-center">
                            <?php echo "<h5>$kategori</h5>" ?>
                            <p>
                                <a href="index.php?Page=Produk&Kategori=<?php echo $kategori;?>" class="btn btn-sm btn-primary">
                                    <?php echo "Lihat" ?>
                                </a>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- <div class="row px-xl-5 pb-3">
        <div class="col-md-12 mt-5">
            <a href="index.php?Page=Layanan">Lihat Selengkapnya</a>
        </div>
    </div> -->
</div>
<!-- Vendor End -->