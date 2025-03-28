<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesRekapitulasiTransaksi">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <input type="date" name="periode1" id="periode1" class="form-control">
                                <small>Periode Awal</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <input type="date" name="periode2" id="periode2" class="form-control">
                                <small>Periode Akhir</small>
                            </div>
                            <div class="col-md-4 mt-3">
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
                            <div class="col-md-12 text-center text-danger">
                                Silahkan Isi Periode Terlebih Dulu!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>