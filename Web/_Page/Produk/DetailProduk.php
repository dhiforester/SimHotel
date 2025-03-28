    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                    <span class="breadcrumb-item active">Detail Kamar</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <?php
        if(empty($_GET['id'])){
            echo "ID Kamar Tidak Boleh Kosong!";
        }else{
            $id_kamar=$_GET['id'];
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
            $HargaSetelahDiskonRp = "Rp " . number_format($HargaSetelahDiskon,0,',','.');
    ?>
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <form action="javascript:void(0);" id="FormBooking">
            <input type="hidden" id="id_kamar" name="id_kamar" value="<?php echo "$id_kamar"; ?>">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <img src="<?php echo "$base_url_admin/$UrlFoto"; ?>" alt="" width="100%">
                </div>
                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3><?php echo "$nama_kamar"; ?></h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(<?php echo "$JumlahDataReting"; ?> Reviews)</small>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4">
                            <?php
                                
                                if(!empty($DataDiskon['id_diskon'])){
                                    echo "<del>$HargaFormat</del> $HargaSetelahDiskonRp";
                                }else{
                                    echo "$HargaSetelahDiskonRp";
                                }
                            ?>
                        </h3>
                        <p class="mb-4"><?php echo "$deskripsi"; ?></p>
                        <?php
                            if(!empty($ValidasiKetersediaan)){
                                echo 'Kamar Sudah Terisi';
                            }else{
                        ?>
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="">Metodde Pembayaran</label>
                                <select name="id_bank" id="id_bank" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                        //Menampilkan Data Bank
                                        $QryBank = mysqli_query($Conn, "SELECT*FROM bank");
                                        while ($DataBank = mysqli_fetch_array($QryBank)) {
                                            $id_bank= $DataBank['id_bank'];
                                            $nama_bank= $DataBank['nama_bank'];
                                            echo '<option value="'.$id_bank.'">'.$nama_bank.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="">Tanggal Checkin</label>
                                <input type="date" id="TanggalCheckin" name="TanggalCheckin" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Tanggal Checkout</label>
                                <input type="date" id="TanggalCheckout" name="TanggalCheckout" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalBooking">
                                    <i class="fa fa-shopping-cart mr-1"></i> Booking Sekarang
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Shop Detail End -->
<?php } ?>