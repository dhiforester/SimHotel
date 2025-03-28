<?php
    //Menangkap Get
    if(empty($_GET['id_transaksi'])){
        $id_transaksi="";
    }else{
        $id_transaksi=$_GET['id_transaksi'];
    }
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
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Detail Booking</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Detail Booking</span>
    </h2>
    <div class="row px-xl-5">
        <div class="col col-12 p-30 bg-light">
            <div class="row">
                <div class="col-12 mb-4 table table-responsive">
                    <table class="table table-hover">
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
            <div class="row">
                <div class="col-md-12">
                    <b>Informasi Pembayaran</b>
                    <p>
                        Silahkan lakukan pembayaran ke <?php echo "<b>$nama_bank</b>"; ?> di rekening <?php echo "<b>$rekening</b>"; ?> atas nama <?php echo "<b>$atas_nama</b>"; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->