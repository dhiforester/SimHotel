<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    if(empty($_POST['id_transaksi'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger mb-3">';
        echo '      ID Transaksi Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_pelanggan = $DataTransaksi['id_pelanggan'];
        $tanggal= $DataTransaksi['tanggal'];
        $jumlah= $DataTransaksi['jumlah'];
        //Format tanggal
        $strtotime=strtotime($tanggal);
        $tanggal=date('d/m/Y',$strtotime);
        //Format Rupiah
        $HargaProduk = "Rp " . number_format($jumlah,0,',','.');
?>
    <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <small>
                #ID.Transaksi <?php echo "$id_transaksi";?><br>
                #Tanggal Transaksi <?php echo "$tanggal";?><br>
                #Jumlah Transaksi<br>
            </small>
            <h4>
                <b>
                    <?php echo "$HargaProduk";?>
                </b>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="reting">
                <b>Berikan Penilaian Terhadap Layanan Kami</b>
            </label>
            <select name="reting" id="reting" class="form-control">
                <option value="5">Sangat Memuaskan</option>
                <option value="4">Memuaskan</option>
                <option value="3">Biasa Saja</option>
                <option value="2">Buruk</option>
                <option value="1">Sangat Buruk</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="testimoni">
                <b>Testimoni</b>
            </label>
            <textarea name="testimoni" id="testimoni" cols="30" rows="3" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiKirimTestimoniReting">
        </div>
    </div>
<?php } ?>