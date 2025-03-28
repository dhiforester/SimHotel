<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Halaman diskon digunakan untuk mengelola diskon kamar berdasarkan periode waktu.<br>';
                echo '  Diskon yang diterpakan berdasarkan persen potongan harga.<br>';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Batas</small>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" class="form-control">
                                    <button type="submit" class="btn btn-md btn-dark">
                                        <i class="bi bi-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihLayanan">
                                    <i class="bi bi-plus-lg"></i> Tambah Diskon
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelDiskon">

                </div>
            </div>
        </div>
    </div>
</section>