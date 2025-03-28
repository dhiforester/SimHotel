<?php
    //kategori
    if(!empty($_GET['Kategori'])){
        $GetKategori=$_GET['Kategori'];
    }else{
        $GetKategori="";
    }
    //Urutan
    if(!empty($_GET['Urutan'])){
        $Urutan=$_GET['Urutan'];
    }else{
        $Urutan="";
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                    <span class="breadcrumb-item active">Kamar</span>
                </nav>
            </div>
        </div>
    </div>
    <input type="hidden" id="GetKategori" name="GetKategori" value="<?php echo "$GetKategori"; ?>">
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3" id="TabelProduk">
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
</div>
    <!-- Shop End -->