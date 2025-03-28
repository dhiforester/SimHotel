<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Silahkan isi form booking berikut ini untuk melakukan booking manual.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <form action="javascript:void(0);" id="ProsesTambahBooking" autocomplete="off">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mb-2">
                                <b>
                                    <i class="bi bi-plus"></i> Tambah Booking Manual
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
                                <input type="text" name="id_pelanggan" id="GetIdPelangganHere" class="form-control">
                                <small>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalCariPelanggan">
                                        <i class="bi bi-search"></i> Cari Data Pelanggan
                                    </a>
                                </small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" name="nama" id="GetNamaPelangganHere" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="estimasi">Tanggal Booking</label>
                                <input type="date" name="estimasi" id="estimasi" class="form-control">
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
                                                $id_mitra= $data['id_mitra'];
                                                $nama_mitra= $data['nama_mitra'];
                                                echo '<option value="'.$id_mitra.'">';
                                                echo '  '.$nama_mitra.'';
                                                echo '</option>';
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
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_hairstylist_jadwal">Jadwal Layanan</label>
                                <select name="id_hairstylist_jadwal" id="id_hairstylist_jadwal" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status">Status Booking</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Booking">Booking</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Batal">Batal</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_mitra_layanan">
                                    <a href="javascript:void(0);" id="TampilkanLayanan">
                                        <b><i class="bi bi-arrow-down-circle"></i> Tampilkan Layanan</b>
                                    </a>
                                </label>
                                <div id="ListLayanan">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="NotifikasiTambahBooking">
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