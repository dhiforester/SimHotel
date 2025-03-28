<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <a href="index.php?Page=Produk">
            <span class="bg-secondary pr-3 text-dark">Kamar</span>
        </a>
    </h2>
    <div class="row px-xl-5">
        <?php
            $Sekarang=date('Y-m-d');
            //Menampilkan Produk
            $query = mysqli_query($Conn, "SELECT*FROM kamar ORDER BY nama_kamar ASC LIMIT 12");
            while ($data = mysqli_fetch_array($query)) {
                $id_kamar= $data['id_kamar'];
                $nama= $data['nama_kamar'];
                $kategori= $data['kategori'];
                $harga= $data['harga'];
                $foto= $data['foto'];
                $harga_rp = "Rp " . number_format($harga,0,',','.');
                //Menghitung reting
                $JumlahDataReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_kamar='$id_kamar'"));
                if(empty($JumlahDataReting)){
                    $JumlahReting=0;
                    $Reting=0;
                }else{
                    $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(reting) AS reting FROM reting WHERE id_kamar='$id_kamar'"));
                    $JumlahReting = $Sum['reting'];
                    $Reting=$JumlahReting/$JumlahDataReting;
                }
                $Reting=round($Reting);
                //Membuka data diskon
                $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_kamar='$id_kamar' AND tanggal_mulai<='$Sekarang' AND tanggal_selesai>='$Sekarang'")or die(mysqli_error($Conn));
                $DataDiskon = mysqli_fetch_array($QryDiskon);
                if(!empty($DataDiskon['id_diskon'])){
                    $diskon=$DataDiskon['diskon'];
                    $NilaiDiskon=($diskon/100)*$harga;
                }else{
                    $diskon="";
                    $NilaiDiskon=0;
                }
                $HargaSetelahDiskon=$harga-$NilaiDiskon;
                $HargaSetelahDiskonRp = "Rp " . number_format($HargaSetelahDiskon,0,',','.');
        ?>
            <div class="col col-6 col-md-3 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo "$base_url_admin/assets/img/kamar/$foto"; ?>" alt="">
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailProduk" data-id="<?php echo "$id_kamar"; ?>" title="Lihat Detail Produk">
                            <?php echo "$nama"; ?>
                        </a>
                        <br>
                        <small>
                            <i class="bi bi-tags"></i></i> <?php echo "$kategori"; ?>
                        </small>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <?php 
                                if(!empty($DataDiskon['id_diskon'])){
                                    echo "<del>$harga_rp</del><br>"; 
                                    echo "<h5>$HargaSetelahDiskonRp</h5>"; 
                                }else{
                                    echo "<h5>$harga_rp</h5>"; 
                                }
                            ?>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star <?php if($Reting>=1){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=2){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=3){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=4){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=5){echo "text-primary";} ?> mr-1"></small>
                            <small>(<?php echo $Reting;?>)</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Products End -->