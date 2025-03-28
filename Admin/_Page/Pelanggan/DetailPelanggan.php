<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Patient</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              Patient ID Data Undefined.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Detail Patient';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pelanggan=$_GET['id'];
        //Buka data pelanggan
        $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
        $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
        $id_pelanggan= $Datapelanggan['id_pelanggan'];
        $nama= $Datapelanggan['nama'];
        $kontak= $Datapelanggan['kontak'];
        $email= $Datapelanggan['email'];
        $datetime_daftar= $Datapelanggan['datetime_daftar'];
        $datetime_update= $Datapelanggan['datetime_update'];
        date_default_timezone_set('Asia/Jakarta');
        $datetime_daftar= strtotime($datetime_daftar);
        $datetime_update= strtotime($datetime_update);
        $datetime_daftar=date('d/m/Y H:i', $datetime_daftar);
        $datetime_update=date('d/m/Y H:i', $datetime_update);
        $JumlahKunjungan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_pelanggan='$id_pelanggan'"));
?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <b>
                        <i class="bi bi-info-circle"></i> Informasi Pelanggan
                    </b>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=Pelanggan" class="btn btn-md btn-dark btn-rounded btn-block">
                        <i class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-2"> 
                <div class="col-md-3"><dt>ID Pelanggan</dt></div>
                <div class="col-md-9"><?php echo $id_pelanggan; ?></div>
            </div>
            <div class="row mt-2"> 
                <div class="col-md-3"><dt>Nama</dt></div>
                <div class="col-md-9"><?php echo $nama; ?></div>
            </div>
            <div class="row mt-2"> 
                <div class="col-md-3"><dt>Kontak</dt></div>
                <div class="col-md-9"><?php echo $kontak; ?></div>
            </div>
            <div class="row mt-2"> 
                <div class="col-md-3"><dt>Email</dt></div>
                <div class="col-md-9"><?php echo $email; ?></div>
            </div>
            <div class="row mt-2"> 
                <div class="col-md-3"><dt>Tanggal Pendaftaran</dt></div>
                <div class="col-md-9"><?php echo $datetime_daftar; ?></div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <b><i class="bi bi-tags"></i> Riwayat Booking</b>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"><b>No</b></th>
                                    <th class="text-center"><b>Tanggal Daftar</b></th>
                                    <th class="text-center"><b>Estimasi Antrian</b></th>
                                    <th class="text-center"><b>Mitra/Hairstylist</b></th>
                                    <th class="text-center"><b>Pembayaran</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(empty($JumlahKunjungan)){
                                        echo '<tr>';
                                        echo '  <td class="text-center" colspan="5">Belum Ada Data Booking Kunjungan</td>';
                                        echo '</tr>';
                                    }
                                    $no = 1;
                                    $JumlahTotal=0;
                                    $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_pelanggan='$id_pelanggan' ORDER BY id_kunjungan DESC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_kunjungan= $data['id_kunjungan'];
                                        $id_pelanggan= $data['id_pelanggan'];
                                        $id_mitra= $data['id_mitra'];
                                        $id_hairstylist= $data['id_hairstylist'];
                                        $id_hairstylist_jadwal= $data['id_hairstylist_jadwal'];
                                        $antrian= $data['antrian'];
                                        $estimasi= $data['estimasi'];
                                        $nama= $data['nama'];
                                        $datetime_daftar= $data['datetime_daftar'];
                                        $status= $data['status'];
                                        $strtotime=strtotime($datetime_daftar);
                                        $strtotime2=strtotime($estimasi);
                                        //Format datetime_daftar
                                        $datetime_daftar=date('d/m/y H:i', $strtotime);
                                        $estimasi=date('d/m/y H:i', $strtotime2);
                                        //Buka nama mitra
                                        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                                        $DataMitra = mysqli_fetch_array($QryMitra);
                                        if(!empty($DataMitra['nama_mitra'])){
                                            $nama_mitra= $DataMitra['nama_mitra'];
                                        }else{
                                            $nama_mitra="Tidak Diketahui";
                                        }
                                        
                                        //Buka nama hairstylist
                                        $QryHairstylist = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
                                        $DataHairstylist = mysqli_fetch_array($QryHairstylist);
                                        if(!empty($DataHairstylist['nama'])){
                                            $NamaHairstylist= $DataHairstylist['nama'];
                                        }else{
                                            $NamaHairstylist="Tidak Diketahui";
                                        }
                                        //Buka Pembayaran
                                        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM  transaksi_pembayaran WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
                                        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
                                        if(!empty($DataPembayaran['id_transaksi_pembayaran'])){
                                            $tagihan= $DataPembayaran['tagihan'];
                                            $StatusPembayaran= $DataPembayaran['status'];
                                            $TagihanRp = "Rp " . number_format($tagihan,0,',','.');
                                            $JumlahTotal=$JumlahTotal+$tagihan;
                                        }else{
                                            $tagihan=0;
                                            $StatusPembayaran="None";
                                            $TagihanRp = "Rp 0";
                                            $JumlahTotal=$JumlahTotal+$tagihan;
                                        }
                                        
                                ?>
                                    <tr>
                                        <td class="text-center text-xs">
                                            <?php echo "$no" ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "$datetime_daftar";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<b>Antrian $antrian</b><br>";
                                                echo "<small>$estimasi</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<b>$nama_mitra</b><br>";
                                                echo "<small>$NamaHairstylist</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo '<b>'.$TagihanRp.'</b><br>';
                                                echo "<small>$StatusPembayaran</small>";
                                            ?>
                                        </td>
                                    </tr>
                                <?php 
                                        $no++;
                                    } 
                                    $JumlahTotalRp = "Rp " . number_format($JumlahTotal,0,',','.');
                                ?>
                                <tr>
                                    <td colspan="4">
                                        <b>JUMLAH TOTAL</b>
                                    </td>
                                    <td>
                                        <b><?php echo "$JumlahTotalRp"; ?></b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>