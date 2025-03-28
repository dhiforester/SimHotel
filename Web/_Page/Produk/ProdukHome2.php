<?php
    //kategori
    if(!empty($_GET['kategori'])){
        $GetKategori=$_GET['kategori'];
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
                    <span class="breadcrumb-item active">Produk</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <form action="javascript:void(0);" id="ProsesBatas">
                    <input type="hidden" name="keyword_by" id="keyword_by" value="kategori">
                    <?php
                        $JumlahSemuaProduk = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
                    ?>
                    <!-- Price Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Kategori</span>
                    </h5>
                    <div class="bg-light p-4 mb-30">
                        <?php
                            echo '<div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">';
                            if(empty($GetKategori)){
                                echo '  <input type="radio" checked class="custom-control-input" id="keyword" name="keyword" value="">';
                            }else{
                                echo '  <input type="radio" checked class="custom-control-input" id="keyword" name="keyword" value="">';
                            }
                            echo '  <label class="custom-control-label" for="keyword">Semua Produk</label>';
                            echo '  <span class="badge border font-weight-normal text-dark">'.$JumlahSemuaProduk.'</span>';
                            echo '</div>';
                            //Menampilkan Kategori
                            $no=1;
                            $query = mysqli_query($Conn, "SELECT*FROM barang_kategori ORDER BY kategori ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                $kategori= $data['kategori'];
                                $foto= $data['foto'];
                                $JumlahProduk = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE kategori='$kategori'"));
                                echo '<div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">';
                                if($GetKategori==$kategori){
                                    echo '  <input type="radio" checked class="custom-control-input" id="keyword'.$no.'" name="keyword" value="'.$kategori.'">';
                                }else{
                                    echo '  <input type="radio" class="custom-control-input" id="keyword'.$no.'" name="keyword" value="'.$kategori.'">';
                                }
                                echo '  <label class="custom-control-label" for="keyword'.$no.'">'.$kategori.'</label>';
                                echo '  <span class="badge border font-weight-normal text-dark">'.$JumlahProduk.'</span>';
                                echo '</div>';
                                $no++;
                            }
                        ?>
                    </div>
                    <!-- Price End -->
                    
                    <!-- Color Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Urutan Produk</span>
                    </h5>
                    <div class="bg-light p-4 mb-30">
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" <?php if($Urutan==""){echo "checked";} ?> class="custom-control-input" id="PalingBaru" name="OrderBy" value="id_barang">
                            <label class="custom-control-label" for="PalingBaru">Paling Baru</label>
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" <?php if($Urutan=="terjual"){echo "checked";} ?> class="custom-control-input" id="PalingLaku" name="OrderBy" value="terjual">
                            <label class="custom-control-label" for="PalingLaku">Produk Paling Laku</label>
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" <?php if($Urutan=="diskon"){echo "checked";} ?> class="custom-control-input" id="ProdukDiskon" name="OrderBy" value="diskon">
                            <label class="custom-control-label" for="ProdukDiskon">Produk Dikson</label>
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" <?php if($Urutan=="favorit"){echo "checked";} ?> class="custom-control-input" id="PalingDisukai" name="OrderBy" value="favorit">
                            <label class="custom-control-label" for="PalingDisukai">Produk Paling Disukai</label>
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" <?php if($Urutan=="komentar"){echo "checked";} ?> class="custom-control-input" id="Terkomentari" name="OrderBy" value="komentar">
                            <label class="custom-control-label" for="Terkomentari">Produk Terkomentari</label>
                        </div>
                    </div>
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Showing</span>
                    </h5>
                    <div class="bg-light p-4 mb-30">
                        <select name="batas" id="batas" class="form-control">
                            <option value="3">3 Item</option>
                            <option value="6">6 Item</option>
                            <option selected value="12">12 Item</option>
                            <option value="24">24 Item</option>
                            <option value="48">48 Item</option>
                            <option value="96">96 Item</option>
                        </select>
                    </div>
                    <!-- Color End -->
                    <button type="submit" class="btn btn-md btn-primary w-100 mb-4">
                        Filter
                    </button>
                </form>
            </div>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3" id="TabelProduk">
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
</div>
    <!-- Shop End -->