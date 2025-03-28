<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_kamar
    if(empty($_POST['id_kamar'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Kamar Tidak Boleh Kosong';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_kamar=$_POST['id_kamar'];
        //Buka data kamar
        $Qry = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_kamar'")or die(mysqli_error($Conn));
        $data = mysqli_fetch_array($Qry);
        $id_kamar= $data['id_kamar'];
        $id_kategori= $data['id_kategori'];
        $kategori= $data['kategori'];
        $harga= $data['harga'];
        $deskripsi= $data['deskripsi'];
        $nama_kamar= $data['nama_kamar'];
        $foto=$data['foto'];
?>
    <input type="hidden" name="id_kamar" id="id_kamar" value="<?php echo "$id_kamar"; ?>">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="id_kategori">Kategori/Kelas</label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                <option value="">Pilih</option>
                <?php 
                    $QryKategori = mysqli_query($Conn, "SELECT*FROM kategori ORDER BY kategori ASC");
                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                        $IdKategori= $DataKategori['id_kategori'];
                        $KategoriList= $DataKategori['kategori'];
                        if($IdKategori==$id_kategori){
                            echo '<option selected value="'.$IdKategori.'">'.$KategoriList.'</option>';
                        }else{
                            echo '<option value="'.$IdKategori.'">'.$KategoriList.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="nama_kamar">Nama Kamar</label>
            <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" value="<?php echo "$nama_kamar"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="harga">Harga Kamar/Malam</label>
            <input type="text" name="harga" id="harga" class="form-control" value="<?php echo "$harga"; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"><?php echo "$deskripsi"; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditKamar">
            <small class="text-primary">Pastikan Data Kamar Yang Anda Masukan Sudah Sesuai</small>
        </div>
    </div>
<?php } ?>