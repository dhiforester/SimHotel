<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    //Tangkap id_barang
    if(empty($_POST['id_barang'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Layanan Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_barang=$_POST['id_barang'];
        //Buka data produk
        $QryProduuk = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_barang'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduuk);
        $id_kamar= $DataProduk['id_kamar'];
        $kategori= $DataProduk['kategori'];
        $nama_kamar= $DataProduk['nama_kamar'];
        $deskripsi= $DataProduk['deskripsi'];
        $harga= $DataProduk['harga'];
        $HargaRp = "Rp " . number_format($harga,0,',','.');
        $foto= $DataProduk['foto'];
?>
    <div class="row">
        <div class="col-md-12 mt-3 text-center">
            <img src="<?php echo "$base_url_admin/assets/img/kamar/$foto"; ?>" alt="<?php echo $nama_kamar;?>" width="100%">
        </div>
        <div class="col-md-12 mt-3">
            <h4><?php echo $nama_kamar;?></h4>
            <?php
                echo '<small>'.$kategori.'</small><br>';
                echo '<small>'.$deskripsi.'</small><br>';
                echo '<h4>'.$HargaRp.'/Malam</h4><br>';
            ?>
        </div>
        <div class="col-md-12 mt-3">
            <a href="index.php?Page=Produk&Sub=Detail&id=<?php echo ''.$id_kamar.'';?>" class="btn btn-md btn-primary btn-block">
                Booking
            </a>
        </div>
    </div>
<?php } ?>