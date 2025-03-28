    <?php
    if(empty($_GET['id'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Kunjungan Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_kunjungan=$_GET['id'];
        //Buka data kunjungan
        $QryKunjungan = mysqli_query($Conn,"SELECT * FROM pelanggan_kunjungan WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
        $DataKunjungan = mysqli_fetch_array($QryKunjungan);
        $id_pelanggan = $DataKunjungan['id_pelanggan'];
        $id_mitra = $DataKunjungan['id_mitra'];
        $id_hairstylist = $DataKunjungan['id_hairstylist'];
        $id_hairstylist_jadwal = $DataKunjungan['id_hairstylist_jadwal'];
        $antrian = $DataKunjungan['antrian'];
        $estimasi = $DataKunjungan['estimasi'];
        $nama = $DataKunjungan['nama'];
        $datetime_daftar = $DataKunjungan['datetime_daftar'];
        $status = $DataKunjungan['status'];
        $strtotime=strtotime($datetime_daftar);
        $strtotime2=strtotime($estimasi);
        //Format datetime_daftar
        $datetime_daftar=date('d/m/y H:i', $strtotime);
        $estimasi=date('Y-m-d', $strtotime2);
        $jam_estimasi=date('H:i', $strtotime2);
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
        //Buka Transaksi Rincian
        $QryRincian = mysqli_query($Conn,"SELECT * FROM  transaksi_rincian WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
        $DataRincian = mysqli_fetch_array($QryRincian);
        if(!empty($DataRincian['id_transaksi_rincian'])){
            $id_transaksi= $DataRincian['id_transaksi'];
        }else{
            $id_transaksi ="";
        }
        //Buka Pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM  transaksi_pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        if(!empty($DataPembayaran['id_pembayaran'])){
            $tagihan= $DataPembayaran['tagihan'];
            $StatusPembayaran= $DataPembayaran['status'];
            $TagihanRp = "Rp " . number_format($tagihan,0,',','.');
        }else{
            $TagihanRp ="";
            $StatusPembayaran="None";
        }
        //Buka jadwal
        $QryJadwal = mysqli_query($Conn,"SELECT * FROM  hairstylist_jadwal WHERE id_hairstylist_jadwal='$id_hairstylist_jadwal'")or die(mysqli_error($Conn));
        $Datajadwal = mysqli_fetch_array($QryJadwal);
        if(!empty($Datajadwal['id_hairstylist_jadwal'])){
            $jam_mulai= $Datajadwal['jam_mulai'];
            $jam_selesai= $Datajadwal['jam_selesai'];
            $Jadwal="$jam_mulai s/d $jam_selesai";
        }else{
            $Jadwal ="";
        }
?>
<section class="section dashboard">
    <form action="javascript:void(0);" id="ProsesEditBooking" autocomplete="off">
        <input type="hidden" name="id_kunjungan" id="id_kunjungan" value="<?php echo "$id_kunjungan"; ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mb-2">
                                <b>
                                    <i class="bi bi-plus"></i> Edit Booking
                                </b>
                            </div>
                            <div class="col-md-2 mb-2">
                                <a href="index.php?Page=Booking" class="btn btn-md btn-dark w-100">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="id_pelanggan">ID Pelanggan *</label>
                                <input type="text" name="id_pelanggan" id="GetIdPelangganHere" class="form-control" value="<?php echo "$id_pelanggan"; ?>">
                                <small>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalCariPelanggan">
                                        <i class="bi bi-search"></i> Cari Data Pelanggan
                                    </a>
                                </small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" name="nama" id="GetNamaPelangganHere" class="form-control" value="<?php echo "$nama"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="estimasi">Tanggal Booking</label>
                                <input type="date" name="estimasi" id="estimasi" class="form-control" value="<?php echo "$estimasi"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_mitra">Mitra</label>
                                <select name="id_mitra" id="id_mitra" required class="form-control">
                                    <?php
                                        if(empty($SessionIdMitra)){
                                            //Select option mitra
                                            echo '<option value="">';
                                            echo '  Pilih';
                                            echo '</option>';
                                            $query = mysqli_query($Conn, "SELECT*FROM mitra ORDER BY nama_mitra ASC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_mitra_list= $data['id_mitra'];
                                                $nama_mitra_list= $data['nama_mitra'];
                                                if($id_mitra_list==$id_mitra){
                                                    echo '<option selected value="'.$id_mitra_list.'">';
                                                    echo '  '.$nama_mitra_list.'';
                                                    echo '</option>';
                                                }else{
                                                    echo '<option value="'.$id_mitra_list.'">';
                                                    echo '  '.$nama_mitra_list.'';
                                                    echo '</option>';
                                                }
                                            }
                                        }else{
                                            //Buka mitra
                                            $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$GetIdMitra'")or die(mysqli_error($Conn));
                                            $DataMitra = mysqli_fetch_array($QryMitra);
                                            $GetNamaMitra= $DataMitra['nama_mitra'];
                                            echo '<option value="'.$SessionIdMitra.'">';
                                            echo '  '.$GetNamaMitra.'';
                                            echo '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="id_hairstylist">Hairstylist</label>
                                <select name="id_hairstylist" id="id_hairstylist" class="form-control">
                                    <option value="<?php echo $id_hairstylist;?>"><?php echo $NamaHairstylist;?></option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_hairstylist_jadwal">Jadwal Layanan</label>
                                <select name="id_hairstylist_jadwal" id="id_hairstylist_jadwal" class="form-control">
                                    <option value="<?php echo $id_hairstylist_jadwal;?>"><?php echo $jam_estimasi;?></option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status">Status Booking</label>
                                <select name="status" id="status" class="form-control">
                                    <option <?php if(empty($status)){echo "selected";} ?> value="">Pilih</option>
                                    <option <?php if($status=="Booking"){echo "selected";} ?> value="Booking">Booking</option>
                                    <option <?php if($status=="Selesai"){echo "selected";} ?> value="Selesai">Selesai</option>
                                    <option <?php if($status=="Batal"){echo "selected";} ?> value="Batal">Batal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_mitra_layanan">
                                    <a href="javascript:void(0);" id="TampilkanLayanan">
                                        <b><i class="bi bi-arrow-down-circle"></i> Tampilkan Layanan</b>
                                    </a>
                                </label>
                                <div id="ListLayanan">
                                    <?php
                                        //Tampilkan data layanan secara distinct
                                        $query = mysqli_query($Conn, "SELECT * FROM mitra_layanan WHERE id_mitra='$id_mitra'");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_mitra_layanan= $data['id_mitra_layanan'];
                                            $id_layanan= $data['id_layanan'];
                                            $keterangan= $data['keterangan'];
                                            $harga= $data['harga'];
                                            $hasil_rupiah = "Rp " . number_format($harga,0,',','.');
                                            //Buka namnya
                                            $Qry = mysqli_query($Conn,"SELECT * FROM layanan WHERE id_layanan='$id_layanan'")or die(mysqli_error($Conn));
                                            $DataLayanan = mysqli_fetch_array($Qry);
                                            $nama_layanan= $DataLayanan['nama_layanan'];
                                            //Buka rincian
                                            $QryRincian = mysqli_query($Conn,"SELECT * FROM transaksi_rincian WHERE id_mitra_layanan='$id_mitra_layanan' AND id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
                                            $DataRincian = mysqli_fetch_array($QryRincian);
                                            if(empty($DataRincian['id_transaksi_rincian'])){
                                                echo '<div class="form-check">';
                                                echo '  <input class="form-check-input" type="checkbox" name="id_mitra_layanan[]" id="id_mitra_layanan" value="'.$id_mitra_layanan.'">';
                                                echo '  <label class="form-check-label" for="id_mitra_layanan"> ';
                                                echo '      '.$nama_layanan.' - '.$keterangan.' ('.$hasil_rupiah.')';
                                                echo '  </label>';
                                                echo '</div>';
                                            }else{
                                                echo '<div class="form-check">';
                                                echo '  <input class="form-check-input" checked type="checkbox" name="id_mitra_layanan[]" id="id_mitra_layanan" value="'.$id_mitra_layanan.'">';
                                                echo '  <label class="form-check-label" for="id_mitra_layanan"> ';
                                                echo '      '.$nama_layanan.' - '.$keterangan.' ('.$hasil_rupiah.')';
                                                echo '  </label>';
                                                echo '</div>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="NotifikasiEditBooking">
                                <span class="text-dark">Pastikan Data Booking Yang Anda Masukan Sudah Benar</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-success">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?php } ?>