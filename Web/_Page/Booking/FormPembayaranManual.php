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
        $id_mitra = $DataTransaksi['id_mitra'];
        $id_pelanggan = $DataTransaksi['id_pelanggan'];
        $tanggal = $DataTransaksi['tanggal'];
        $tagihan = $DataTransaksi['tagihan'];
        $biaya_adm = $DataTransaksi['biaya_adm'];
        $ppn = $DataTransaksi['ppn'];
        $total = $DataTransaksi['total'];
        $metode = $DataTransaksi['metode'];
        $status = $DataTransaksi['status'];
        $StrTransaksi=strtotime($tanggal);
        $TanggalTransaksi=date('d/m/y H:i', $StrTransaksi);
        $NominalTagihan = "Rp " . number_format($tagihan,0,',','.');
        $NominalBiayaAdm = "Rp " . number_format($biaya_adm,0,',','.');
        $NominalPpn = "Rp " . number_format($ppn,0,',','.');
        $NominalTotal = "Rp " . number_format($total,0,',','.');
?>
    <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <small>
                #ID.Transaksi <?php echo "$id_transaksi";?>
            </small>
            <h4>
                <b>
                    <?php echo "$NominalTotal";?>
                </b>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="metode">
                <b>Pilih Metode Pembayaran</b>
            </label>
            <select name="metode" id="metode" class="form-control">
                <option value="">Pilih</option>
                <?php
                    //Menampilkan akun bank
                    $query = mysqli_query($Conn, "SELECT*FROM setting_bank");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_setting_bank=$data['id_setting_bank'];
                        $nama_bank=$data['nama_bank'];
                        $rekening=$data['rekening'];
                        $atas_nama=$data['atas_nama'];
                        echo '<option value="'.$nama_bank.'">'.$nama_bank.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <div id="PreviewPembayaran">
    </div>
    
<?php } ?>