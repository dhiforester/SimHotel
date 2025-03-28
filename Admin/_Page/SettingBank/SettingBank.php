<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan akun bank.';
                echo '  Data akun bank yang anda tambahkan disini akan digunakan pelanggan untuk melakukan transaksi.';
                echo '  Pastikan semua akun bank yang ada disini sudah sesuai dan aktif.';
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
                            <div class="col-md-1 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option selected value="16">16</option>
                                    <option value="32">32</option>
                                    <option value="64">64</option>
                                    <option value="128">128</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-5 mt-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" id="keyword" aria-describedby="basic-addon2"  placeholder="Kata Kunci">
                                    <button type="submit" class="btn btn-md btn-dark input-group-text" id="basic-addon2">
                                        <i class="bi bi-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalFilterSettingBank" title="Filter Akun Bank">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                            </div>
                            <div class="col-md-4 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahSettingBank" title="Tambah Akun Bank">
                                    <i class="bi bi-plus-lg"></i> Akun Bank
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="MenampilkanSettingBank">

    </div>
</section>