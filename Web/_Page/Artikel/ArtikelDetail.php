<?php
    if(empty($_GET['id'])){
        $id="";
    }else{
        $id=$_GET['id'];
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <a class="breadcrumb-item text-dark" href="index.php?Page=Artikel">Artikel</a>
                <span class="breadcrumb-item active">Detail Artikel</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Detail Artikel</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="bg-light p-30 mb-30">
                <?php
                    if(empty($_GET['id'])){
                        echo "Maaf ID Artikel Tidak Boleh Kosong";
                    }else{
                        //Buka data bantuan
                        $QryArtikel = mysqli_query($Conn,"SELECT * FROM konten_posting WHERE id_konten_posting='$id'")or die(mysqli_error($Conn));
                        $DataArtikel = mysqli_fetch_array($QryArtikel);
                        if(empty($DataArtikel['id_konten_posting'])){
                            echo "Maaf ID Artikel Tidak Valid";
                        }else{
                            $id_konten_posting= $DataArtikel['id_konten_posting'];
                            $judul_posting= $DataArtikel['judul_posting'];
                            $tag_posting= $DataArtikel['tag_posting'];
                            $kategori_posting= $DataArtikel['kategori_posting'];
                            $isi_posting= $DataArtikel['isi_posting'];
                            $status_posting= $DataArtikel['status_posting'];
                            $image_posting= $DataArtikel['image_posting'];
                            $datetime_posting= $DataArtikel['datetime_posting'];
                            $strtotime=strtotime($datetime_posting);
                            $tanggal=date('d/m/Y', $strtotime);
                            echo '<div class="row">';
                            echo '  <div class="col-md-2">';
                            echo '      <img src="'.$base_url_admin.'/assets/img/Posting/'.$image_posting.'" width="100%">';
                            echo '  </div>';
                            echo '  <div class="col-md-10">';
                            echo '      <h4 class="mt-3">'.$judul_posting.'</h3>';
                            echo '      <small><i class="bi bi-calendar"></i> '.$tanggal.'</small><br>';
                            echo '      <small><i class="bi bi-tags"></i> '.$tag_posting.'</small>';
                            echo '      <p>'.$isi_posting.'</p>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->