<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_transaksi'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
         //Buka data transaksi
    $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
    $DataTransaksi = mysqli_fetch_array($QryTransaksi);
    $id_pelanggan = $DataTransaksi['id_pelanggan'];
    $id_bank = $DataTransaksi['id_bank'];
    $id_kamar = $DataTransaksi['id_kamar'];
    $tanggal = $DataTransaksi['tanggal'];
    $checkin = $DataTransaksi['checkin'];
    $checkout = $DataTransaksi['checkout'];
    $harga = $DataTransaksi['harga'];
    $jumlah_hari = $DataTransaksi['jumlah_hari'];
    $diskon = $DataTransaksi['diskon'];
    $jumlah = $DataTransaksi['jumlah'];
    $status_pembayaran = $DataTransaksi['status_pembayaran'];
    $status_kamar = $DataTransaksi['status_kamar'];
    $StrTransaksi=strtotime($tanggal);
    $TanggalTransaksi=date('d/m/y H:i', $StrTransaksi);
    $StrCheckin=strtotime($checkin);
    $TglCheckin=date('d/m/y', $StrCheckin);
    $StrCheckout=strtotime($checkout);
    $TglCheckout=date('d/m/y', $StrCheckout);

    $hargaRp = "Rp " . number_format($harga,0,',','.');
    $DiskonRp = "Rp " . number_format($diskon,0,',','.');
    $JumlahRp = "Rp " . number_format($jumlah,0,',','.');

    //Bank
    $QrySettingBank = mysqli_query($Conn,"SELECT * FROM bank WHERE id_bank='$id_bank'")or die(mysqli_error($Conn));
    $DataSettingBank = mysqli_fetch_array($QrySettingBank);
    $id_setting_bank= $DataSettingBank['id_bank'];
    $nama_bank= $DataSettingBank['nama_bank'];
    $rekening= $DataSettingBank['no_rekening'];
    $atas_nama= $DataSettingBank['nama_akun'];
    $logo= $DataSettingBank['logo_bank'];
?>
<div class="modal-body">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><b>ID Transaksi</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $id_transaksi;?></td>
                        </tr>
                        <tr>
                            <td><b>Tgl. Transaksi</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $TanggalTransaksi;?></td>
                        </tr>
                        <tr>
                            <td><b>Checkin & Checkout</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$TglCheckin s/d $TglCheckout ($jumlah_hari Hari)";?></td>
                        </tr>
                        <tr>
                            <td><b>Hraga/Malam</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $hargaRp;?></td>
                        </tr>
                        <tr>
                            <td><b>Diskon</b></td>
                            <td><b>:</b></td>
                            <td><?php echo $DiskonRp;?></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Tagihan</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$JumlahRp";?></td>
                        </tr>
                        <tr>
                            <td><b>Status Pembayaran</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$status_pembayaran";?></td>
                        </tr>
                        <tr>
                            <td><b>Status Kamar</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$status_kamar";?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Tutup
            </button>
        </div>
    </div>
</div>
<?php } ?>