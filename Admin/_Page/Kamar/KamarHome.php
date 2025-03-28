<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data ketersediaan kamar. Anda bisa menambahkan kamar, mengelola detail spesifikasi kamar, ';
                echo '  mengatur harga permalam dan menambah informasi sarana prasarana yang tersedia.';
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
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option selected value="12">12</option>
                                    <option value="24">24</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" id="keyword" aria-describedby="basic-addon2"  placeholder="Kata Kunci">
                                    <button type="submit" class="btn btn-md btn-dark input-group-text" id="basic-addon2">
                                        <i class="bi bi-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3 text-center mt-3">
                                <button type="button" class="btn btn-md btn-info btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahKategori" title="Tambah Kategori">
                                    <i class="bi bi-card-checklist"></i> Kategori/Kelas
                                </button>
                            </div>
                            <div class="col-md-3 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahKamar" title="Tambah Kamar">
                                    <i class="bi bi-plus-lg"></i> Tambah Kamar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="MenampilkanTabelKamar">

    </div>
</section>