<?php
    if(!empty($_GET['id'])){
        $id=$_GET['id'];
        //Buka data laman mandiri
        $QryLamanMandiri = mysqli_query($Conn,"SELECT * FROM konten_posting WHERE id_konten_posting='$id'")or die(mysqli_error($Conn));
        $DataLamanMandiri = mysqli_fetch_array($QryLamanMandiri);
        if(empty($DataLamanMandiri['id_konten_posting'])){
            $id_konten_posting="";
            $judul_posting="";
            $tag_posting="";
            $isi_posting="";
            $status_posting="";
            $image_posting="";
            $datetime_posting="";
            $strtotime="";
            $tanggal="";
        }else{
            $id_konten_posting= $DataLamanMandiri['id_konten_posting'];
            $judul_posting= $DataLamanMandiri['judul_posting'];
            $tag_posting= $DataLamanMandiri['tag_posting'];
            $isi_posting= $DataLamanMandiri['isi_posting'];
            $status_posting= $DataLamanMandiri['status_posting'];
            $image_posting= $DataLamanMandiri['image_posting'];
            $datetime_posting= $DataLamanMandiri['datetime_posting'];
            $strtotime=strtotime($datetime_posting);
            $tanggal=date('d/m/Y', $strtotime);
        }
    }else{
        $id="";
        $id_konten_posting="";
        $judul_posting="";
        $tag_posting="";
        $isi_posting="";
        $status_posting="";
        $image_posting="";
        $datetime_posting="";
        $strtotime="";
        $tanggal="";
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active"><?php echo $judul_posting;?></span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php echo "$judul_posting"; ?></span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="bg-light p-30 mb-30">
            <small>
                <i class="bi bi-clock-history"></i> <?php echo "$tanggal"; ?>
            </small>
            <p><?php echo "$isi_posting"; ?></p>
            
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->