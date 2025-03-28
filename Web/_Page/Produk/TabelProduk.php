<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    //keyword
    if(!empty($_POST['Kategori'])){
        $keyword=$_POST['Kategori'];
    }else{
        $keyword="";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
    }else{
        $ShortBy="DESC";
    }
    //OrderBy
    if(!empty($_POST['OrderBy'])){
        $OrderBy=$_POST['OrderBy'];
    }else{
        $OrderBy="id_kamar";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword)){
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM kamar"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM kamar WHERE kategori like '%$keyword%'"));
    }
?>
<div class="row px-xl-5"></div>
    <?php
        if(empty($jml_data)){
            echo '<div class="col-12 pb-1">';
            echo '  <div class="bg-light p-4 mb-30 text-center">';
            echo '      Tidak ada data kamar yang ditampilkan.';
            echo '  </div>';
            echo '</div>';
        }else{
            $no = 1+$posisi;
            //KONDISI PENGATURAN MASING FILTER
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM kamar ORDER BY $OrderBy $ShortBy");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM kamar WHERE kategori like '%$keyword%' ORDER BY $OrderBy $ShortBy");
            }
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
    <?php $no++; }} ?>
</div>