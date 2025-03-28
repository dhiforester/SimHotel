<?php
    //Tangkap id_akses
    if(empty($_GET['id'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi=$_GET['id'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi= $DataTransaksi['id_transaksi'];
        $id_mitra= $DataTransaksi['id_mitra'];
        $id_pelanggan= $DataTransaksi['id_pelanggan'];
        $tanggal= $DataTransaksi['tanggal'];
        $tagihan= $DataTransaksi['tagihan'];
        $biaya_adm= $DataTransaksi['biaya_adm'];
        $ppn= $DataTransaksi['ppn'];
        $total= $DataTransaksi['total'];
        $metode= $DataTransaksi['metode'];
        $status= $DataTransaksi['status'];
        $total = "Rp " . number_format($total,0,',','.');
        $biaya_adm_rp = "Rp " . number_format($biaya_adm,0,',','.');
        $ppn_rp = "Rp " . number_format($ppn,0,',','.');
        //Buka data mitra
        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
        $DataMitra = mysqli_fetch_array($QryMitra);
        if(!empty($DataMitra['nama_mitra'])){
            $nama_mitra= $DataMitra['nama_mitra'];
        }else{
            $nama_mitra="";
        }
        //Buka data Pelanggan
        $QryPelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
        $DataPelanggan = mysqli_fetch_array($QryPelanggan);
        if(!empty($DataPelanggan['id_pelanggan'])){
            $id_pelanggan= $DataPelanggan['id_pelanggan'];
            $NamaPelanggan= $DataPelanggan['nama'];
        }else{
            $id_pelanggan="";
            $NamaPelanggan="";
        }
        //Buka data Pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        if(!empty($DataPembayaran['id_pembayaran'])){
            $id_pembayaran= $DataPembayaran['id_pembayaran'];
            $MetodePembayaran= $DataPembayaran['metode'];
            $server_key= $DataPembayaran['server_key'];
            $production= $DataPembayaran['production'];
            $order_id= $DataPembayaran['order_id'];
            $tagihan= $DataPembayaran['tagihan'];
            $first_name= $DataPembayaran['first_name'];
            $last_name= $DataPembayaran['last_name'];
            $email= $DataPembayaran['email'];
            $kontak= $DataPembayaran['kontak'];
            $snap_token= $DataPembayaran['snap_token'];
            $StatusPembayaran= $DataPembayaran['status'];
        }else{
            $id_pembayaran="";
            $MetodePembayaran="None";
            $server_key="None";
            $production="None";
            $order_id="None";
            $tagihan="0";
            $first_name="None";
            $last_name="None";
            $email="None";
            $kontak="None";
            $snap_token="None";
            $StatusPembayaran="None";
        }
        $tagihan = "Rp " . number_format($tagihan,0,',','.');
        $strtotime=strtotime($tanggal);
        $tanggal=date('d/m/Y', $strtotime);
?>
    <input type="hidden" name="GetIdPelanggan" id="GetIdPelanggan" value="<?php echo $id_pelanggan;?>">
    <input type="hidden" name="GetIdMitra" id="GetIdMitra" value="<?php echo $id_mitra;?>">
    <input type="hidden" name="GetIdTransaksi2" id="GetIdTransaksi2" value="<?php echo $id_transaksi;?>">
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <b class="card-title">Detail Transaksi</b>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <a href="index.php?Page=Transaksi" class="btn btn-md btn-dark btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>ID</dt></small></td>
                                                <td><small id="GetIdTransaksi"><?php echo "$id_transaksi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Tanggal</dt></small></td>
                                                <td><small><?php echo "$tanggal"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Pelanggan</dt></small></td>
                                                <td><small><?php echo "$id_pelanggan - $NamaPelanggan"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Total</dt></small></td>
                                                <td><small><?php echo "$total"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Metode</dt></small></td>
                                                <td>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalEditMetodeTransaksi" data-id="<?php echo "$id_transaksi"; ?>">
                                                        <small><i class="bi bi-pencil-square"></i></i> <?php echo "$metode"; ?></small>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Mitra</dt></small></td>
                                                <td><small><?php echo "$nama_mitra"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Status</dt></small></td>
                                                <td>
                                                    <small>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalEditStatusTransaksi" data-id="<?php echo "$id_transaksi"; ?>">
                                                        <small><i class="bi bi-pencil-square"></i></i> <?php echo "$status"; ?></small>
                                                    </a>
                                                    </small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <b class="card-title">Detail Pembayaran</b>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="button" class="btn btn-md btn-success btn-rounded btn-block" data-bs-toggle="modal" data-bs-target="#ModalEditPembayaran" data-id="<?php echo "$id_transaksi"; ?>">
                                    <i class="bi bi-pencil"></i> Ubah Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>ID</dt></small></td>
                                                <td><small><?php echo "$id_pembayaran"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Order ID</dt></small></td>
                                                <td><small><?php echo "$order_id"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Metode</dt></small></td>
                                                <td>
                                                    <?php 
                                                        echo "$MetodePembayaran<br>";
                                                        if($MetodePembayaran=="Transfer"){
                                                            echo '<small>'.$server_key.'</small>';
                                                        }
                                                    ?>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Pelanggan</dt></small></td>
                                                <td><small><?php echo "$first_name $last_name"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Email</dt></small></td>
                                                <td><small><?php echo "$email"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Tagihan</dt></small></td>
                                                <td><small><?php echo "$tagihan"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Status</dt></small></td>
                                                <td><small><?php echo "$StatusPembayaran"; ?></small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <b class="card-title">Rincian Transaksi</b>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahRincianDetail" data-id="<?php echo "$id_transaksi";?>">
                                    <i class="bi bi-plus"></i> Tambah Rincian
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="list-group list-group-numbered">
                                    <?php
                                        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'"));
                                        if(empty($jml_data)){
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-start text-danger">';
                                            echo '  <div class="ms-2 me-auto">Belum ada data rincian transaksi yang bisa ditampilkan.</div>';
                                            echo '</li>';
                                        }else{
                                            $JumlahRincianTotal=0;
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_transaksi_rincian= $data['id_transaksi_rincian'];
                                                $id_barang= $data['id_barang'];
                                                $id_kunjungan= $data['id_kunjungan'];
                                                $id_mitra= $data['id_mitra'];
                                                $id_mitra_layanan= $data['id_mitra_layanan'];
                                                $nama_layanan= $data['nama_layanan'];
                                                $harga= $data['harga'];
                                                $qty= $data['qty'];
                                                $jumlah= $data['jumlah'];
                                                //Buka nama layanan
                                                $QryLayanan = mysqli_query($Conn,"SELECT * FROM mitra_layanan WHERE id_mitra_layanan='$id_mitra_layanan'")or die(mysqli_error($Conn));
                                                $DataLayanan = mysqli_fetch_array($QryLayanan);
                                                if(!empty($DataLayanan['id_mitra_layanan'])){
                                                    $NamaLayanan= $DataLayanan['keterangan'];
                                                }else{
                                                    $NamaLayanan ="Tidak Diketahui";
                                                }
                                                //FormatRupiahJumlah
                                                $JumlahRp="Rp " . number_format($jumlah,0,',','.');
                                                $HargaRp="Rp " . number_format($harga,0,',','.');
                                                $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                                    ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold"><?php echo $NamaLayanan;?></div>
                                                <?php echo $JumlahRp;?>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalHapusRincianDetail" data-id="<?php echo "$id_transaksi_rincian";?>" title="Hapus Rincian">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </li>
                                    <?php 
                                            }
                                        }
                                        if(empty($jml_data)){
                                            $JumlahTotalRp="Rp 0"; 
                                        }else{
                                            $JumlahTotalRp="Rp " . number_format($JumlahRincianTotal,0,',','.'); 
                                        }
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Biaya Administrasi</div>
                                            <?php echo $biaya_adm_rp;?>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">PPN</div>
                                            <?php echo $ppn_rp;?>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Total Tagihan</div>
                                            <?php echo $total;?>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>