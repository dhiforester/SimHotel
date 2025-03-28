<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesRekapitulasiTransaksi">
                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <input type="date" name="periode1" id="periode1" class="form-control">
                                <small>Periode Awal</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="date" name="periode2" id="periode2" class="form-control">
                                <small>Periode Akhir</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <select name="id_mitra" id="id_mitra" class="form-control">
                                    <?php
                                        //Menampilkan Mitra
                                        if($SessionAkses=="Admin"){
                                            echo '<option value="">Pilih</option>';
                                            $QryMitra = mysqli_query($Conn, "SELECT*FROM mitra ORDER BY nama_mitra ASC");
                                        }else{
                                            $QryMitra = mysqli_query($Conn, "SELECT*FROM mitra WHERE id_mitra='$SessionIdMitra' ORDER BY nama_mitra ASC");
                                        }
                                        while ($DataMitra = mysqli_fetch_array($QryMitra)) {
                                            $id_mitra= $DataMitra['id_mitra'];
                                            $nama_mitra= $DataMitra['nama_mitra'];
                                            echo '<option value="'.$id_mitra.'">'.$nama_mitra.'</option>';
                                        }
                                    ?>
                                </select>
                                <small>Mitra</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanRekapitulasiTransaksi">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-danger" role="alert">
                                    Silahkan Isi Periode Transaksi dan Nama Mitra Terlebih Dulu!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>