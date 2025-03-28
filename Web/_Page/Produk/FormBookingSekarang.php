<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    //Tangkap id_kamar
    if(empty($_POST['id_kamar'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Kamar Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        if(empty($_POST['id_bank'])){
            echo '  <div class="row">';
            echo '      <div class="col-md-12 mb-3">';
            echo '          Metode Pembayaran Tidak Boleh Kosong.';
            echo '      </div>';
            echo '  </div>';
        }else{
            if(empty($_POST['TanggalCheckin'])){
                echo '  <div class="row">';
                echo '      <div class="col-md-12 mb-3">';
                echo '          Tanggal Checkin Tidak Boleh Kosong.';
                echo '      </div>';
                echo '  </div>';
            }else{
                if(empty($_POST['TanggalCheckout'])){
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 mb-3">';
                    echo '          Tanggal Checkout Tidak Boleh Kosong.';
                    echo '      </div>';
                    echo '  </div>';
                }else{
                    $id_kamar=$_POST['id_kamar'];
                    $id_bank=$_POST['id_bank'];
                    $TanggalCheckin=$_POST['TanggalCheckin'];
                    $TanggalCheckout=$_POST['TanggalCheckout'];
                    $date1=date_create($TanggalCheckin); //mis. tgl chekin
                    $date2=date_create($TanggalCheckout); //mis. tgl chekout
                    $diff=date_diff($date1,$date2); //menyimpan didalam fungsi date_dif
                    $JumlahHari=$diff->format("%d%"); //menampilkan jumlah hari
                    $ValidasiKetersediaan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_kamar='$id_kamar' AND checkin='$TanggalCheckin' AND (status_kamar='Booked' OR status_kamar='Checkin')"));
                    if($TanggalCheckout<$TanggalCheckin){
                        echo '  <div class="row">';
                        echo '      <div class="col-md-12 mb-3">';
                        echo '          Tanggal Checkin Tidak Boleh Lebih Besar Dari Checkout.';
                        echo '      </div>';
                        echo '  </div>';
                    }else{
                        if(!empty($ValidasiKetersediaan)){
                            echo '  <div class="row">';
                            echo '      <div class="col-md-12 mb-3">';
                            echo '          Kamar Tidak Tersedia Untuk Tanggal tersebut.';
                            echo '      </div>';
                            echo '  </div>';
                        }else{
                            //Buka detail kamar
                            $Sekarang=date('Y-m-d');
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
                            $UrlFoto="assets/img/kamar/$foto";
                            $HargaFormat = "Rp " . number_format($harga,0,',','.');
                            //Cek ketersediaan kamar
                            $ValidasiKetersediaan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_kamar='$id_kamar' AND (status_kamar='Booked' OR status_kamar='Checkin')"));
                            //Menghitung reting
                            $JumlahDataReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_kamar='$id_kamar'"));
                            if(empty($JumlahDataReting)){
                                $JumlahReting=0;
                                $Reting=0;
                            }else{
                                $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(reting) AS reting FROM reting WHERE id_kamar='$id_kamar'"));
                                $JumlahReting = $Sum['reting'];
                                $Reting=$JumlahReting/$JumlahDataReting;
                            }
                            $Reting=round($Reting);
                            //Membuka data diskon
                            $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_kamar='$id_kamar' AND tanggal_mulai<='$Sekarang' AND tanggal_selesai>='$Sekarang'")or die(mysqli_error($Conn));
                            $DataDiskon = mysqli_fetch_array($QryDiskon);
                            if(!empty($DataDiskon['id_diskon'])){
                                $diskon=$DataDiskon['diskon'];
                                $NilaiDiskon=($diskon/100)*$harga;
                            }else{
                                $diskon="";
                                $NilaiDiskon=0;
                            }
                            $HargaSetelahDiskon=$harga-$NilaiDiskon;
                            $JumlahTagihan=$HargaSetelahDiskon*$JumlahHari;
                            $NilaiDiskonRp = "Rp " . number_format($NilaiDiskon,0,',','.');
                            $JumlahTagihanRp = "Rp " . number_format($JumlahTagihan,0,',','.');
                            $HargaSetelahDiskonRp = "Rp " . number_format($HargaSetelahDiskon,0,',','.');
                            //Bank
                            $QrySettingBank = mysqli_query($Conn,"SELECT * FROM bank WHERE id_bank='$id_bank'")or die(mysqli_error($Conn));
                            $DataSettingBank = mysqli_fetch_array($QrySettingBank);
                            $id_setting_bank= $DataSettingBank['id_bank'];
                            $nama_bank= $DataSettingBank['nama_bank'];
                            $rekening= $DataSettingBank['no_rekening'];
                            $atas_nama= $DataSettingBank['nama_akun'];
                            $logo= $DataSettingBank['logo_bank'];
?>
    <div class="row">
        <div class="col-md-12 table table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td><b>Nama Kamar</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$nama_kamar"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Harga</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$HargaFormat"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Diskon</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$NilaiDiskonRp"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Checkin</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$TanggalCheckin"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Checkout</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$TanggalCheckout"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Hari</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$JumlahHari Hari"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Tagihan</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$JumlahTagihanRp"; ?></td>
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
    <div class="row">
        <div class="col-md-12" id="NotifikasiBooking">
            
        </div>
    </div>
<?php
                        }
                    }
                }
            }
        }
    }
?>