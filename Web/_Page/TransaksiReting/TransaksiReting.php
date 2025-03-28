<?php
    //Transaksi Sudah Selesai dan perlu di reting dan testimoni
    $JumlahWajibReting=0;
    $QryTransaksiTesti = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan' AND status_kamar='Checkout'");
    while ($DataTransaksiTesti = mysqli_fetch_array($QryTransaksiTesti)) {
        $IdTransaksi= $DataTransaksiTesti['id_transaksi'];
        //Cek apakah sudah ada reting
        $JumlahReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_transaksi='$IdTransaksi'"));
        if(empty($JumlahReting)){
            $JumlahWajibReting=$JumlahWajibReting+1;
        }
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Testimoni</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Testimoni & Reting</span></h2>
    <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <div class="row">
                    <div class="col-md-12 mt-4 mb-4 table table-responsive">
                        <table class="table">
                            <tbody>
                                <?php
                                    //Menampilkan list Chat Pelanggan dengan mitra
                                    if(empty($JumlahWajibReting)){
                                        echo '<tr>';
                                        echo '  <td colspan="3" class="text-center text-danger">Tidak Ada Kesempatan Mengisi Testimoni Dan Reting</td>';
                                        echo '</tr>';
                                    }else{
                                        //Buka data Chat
                                        $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan' AND status_kamar='Checkout'");
                                        while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                            $IdTransaksi= $DataTransaksi['id_transaksi'];
                                            $tanggal= $DataTransaksi['tanggal'];
                                            $harga= $DataTransaksi['harga'];
                                            $JumlahReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_transaksi='$IdTransaksi'"));
                                            if(empty($JumlahReting)){
                                                echo '<tr>';
                                                echo '  <td>';
                                                echo '      <b>'.$tanggal.'</b><br>';
                                                echo '      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalTambahTestimoniDanReting" data-id="'.$IdTransaksi.'">Silahkan Isi Testimoni Dan Reting Disini</a>';
                                                echo '  </td>';
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->