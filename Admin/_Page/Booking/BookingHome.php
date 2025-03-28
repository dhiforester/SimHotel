<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data booking. Anda bisa menambahkan menambah booking secara manual untuk pelanggan offline, melihat detail booking, ';
                echo '  merubah informasi booking Dan konfirmasi layanan pelanggan.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesBatas">
                <input type="hidden" name="GetIdMitra" id="GetIdMitra" value="<?php echo "$GetIdMitra"; ?>">
                <div class="row">
                    <div class="col-md-1 mt-3">
                        <select name="batas" id="batas" class="form-control">
                            <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                        </select>
                        <small>Data</small>
                    </div>
                    <div class="col-md-3 mt-3">
                        <input type="text" name="keyword" id="keyword" class="form-control">
                        <small>Kata Kunci</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalFilterBooking" title="Filter Booking">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                    </div>
                    <?php 
                        if(empty($SessionIdMitra)){
                            //Tangkap Get Mitra
                            if(!empty($GetIdMitra)){
                                $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$GetIdMitra'")or die(mysqli_error($Conn));
                                $DataMitra = mysqli_fetch_array($QryMitra);
                                $GetNamaMitra= $DataMitra['nama_mitra'];
                            }else{
                                $GetNamaMitra="Mitra";
                            }
                    ?>
                        <div class="col-md-2 mt-3">
                            <button type="button" class="btn btn-md btn-success btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihMitra" title="Pilih Mitra">
                                <i class="bi bi-list"></i> <?php echo $GetNamaMitra;?>
                            </button>
                        </div>
                        <div class="col-md-2 text-center mt-3">
                            <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahBooking" title="Tambah Booking">
                                <i class="bi bi-plus-lg"></i> Booking
                            </button>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-4 text-center mt-3">
                            <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahBooking" title="Tambah Booking">
                                <i class="bi bi-plus-lg"></i> Booking
                            </button>
                        </div>
                    <?php } ?>
                    
                </div>
            </form>
        </div>
    </div>
    <div id="MenampilkanTabelBooking">
        
    </div>
</section>