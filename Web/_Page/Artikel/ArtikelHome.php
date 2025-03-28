<?php
    if(empty($_GET['tag'])){
        $tag="";
    }else{
        $tag=$_GET['tag'];
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Artikel</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Artikel</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-4 mb-5">
            <div class="bg-light p-30 mb-30">
                <form action="javascript:void(0);" id="ProsesBatas">
                    <input type="hidden" name="keyword_by" id="keyword_by" value="<?php if(!empty($tag)){echo "tag_posting";};?>">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari Bantuan" value="<?php echo $tag;?>">
                        <div class="input-group-append">
                            <button type="submit" class="input-group btn btn-md btn-primary text-light">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                <h4 class="mt-3">Tag/Kategori</h3>
                <ul>
                    <?php
                        $JumlahSemua = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_posting WHERE kategori_posting='Blog'"));
                        echo '<li>';
                        if(empty($_GET['tag'])){
                            $tag="";
                            echo '  <a href="index.php?Page=Artikel" class="text-primary">Semua Artikel ('.$JumlahSemua.')</a>';
                        }else{
                            $tag=$_GET['tag'];
                            echo '  <a href="index.php?Page=Artikel" class="text-dark">Semua Artikel ('.$JumlahSemua.')</a>';
                        }
                        echo '</li>';
                        //Apabila ada Artikel
                        $QryArtikel = mysqli_query($Conn, "SELECT DISTINCT tag_posting FROM konten_posting WHERE kategori_posting='Blog'");
                        while ($DataArtikel = mysqli_fetch_array($QryArtikel)) {
                            $tag_posting= $DataArtikel['tag_posting'];
                            //Jumlah Bantuan
                            $Jumlah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_posting WHERE tag_posting='$tag_posting'"));
                            echo '<li>';
                            if($tag_posting=="$tag"){
                                echo '  <a href="index.php?Page=Artikel&tag='.$tag_posting.'" class="text-primary">'.$tag_posting.' ('.$Jumlah.')</a>';
                            }else{
                                echo '  <a href="index.php?Page=Artikel&tag='.$tag_posting.'" class="text-dark">'.$tag_posting.' ('.$Jumlah.')</a>';
                            }
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-8 mb-5" id="TabelArtikel">
            <div class="row">
                
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->