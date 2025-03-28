<?php
    //Menangkap ID Layanan
    if(empty($_GET['id_layanan'])){
        $id_layanan="";
    }else{
        $id_layanan=$_GET['id_layanan'];
    }
    //Membuka Data Layanan
    $QryLayanan = mysqli_query($Conn,"SELECT * FROM layanan WHERE id_layanan='$id_layanan'")or die(mysqli_error($Conn));
    $DataLayanan = mysqli_fetch_array($QryLayanan);
    $id_layanan= $DataLayanan['id_layanan'];
    $nama_layanan= $DataLayanan['nama_layanan'];
    $deskripsi= $DataLayanan['deskripsi'];
    $foto= $DataLayanan['foto'];
    //Jumlah Mitra Yang Menyediakan
    $JumlahMitra=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_layanan='$id_layanan'"));
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <a class="breadcrumb-item text-dark" href="index.php?Page=Layanan">Layanan</a>
                <span class="breadcrumb-item active">Detail Layanan</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3"><?php echo "$nama_layanan"; ?></span>
    </h2>
    <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-1" title="Info">
                        <i class="fas fa-info-circle"></i> Info
                    </a>
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-2" title="Booking Layanan">
                        <i class="bi bi-building"></i> Mitra
                    </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade" id="tab-pane-1">
                        <h4 class="mb-3">Info Layanan</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo "$base_url_admin/assets/img/Layanan/$foto"; ?>" alt="" width="100%">
                            </div>
                            <div class="col-md-9">
                                <h4>
                                    <?php echo "$nama_layanan"; ?>
                                </h4>
                                <small>
                                    <?php
                                        if(empty($JumlahMitra)){
                                            echo "<span class='text-danger'></span>Belum Ada Mitra Yang Menyediakan Layanan Ini</span>";
                                        }else{
                                            echo "<span class='text-primary'>Layanan ini tersedia di $JumlahMitra mitra</span>";
                                        }
                                    ?>
                                </small>
                                <p>
                                    <?php echo "$deskripsi"; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="tab-pane-2">
                        <h4 class="mb-3">Mitra</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            //Menampilkan list Mitra
                                            if(empty($JumlahMitra)){
                                                echo '<tr>';
                                                echo '  <td colspan="3" class="text-center text-danger">Belum Ada Mitra Yang Menyeediakan Layanan Ini</td>';
                                                echo '</tr>';
                                            }else{
                                                $no=1;
                                                //KONDISI PENGATURAN MASING FILTER
                                                $query = mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_layanan='$id_layanan'");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_mitra_layanan= $data['id_mitra_layanan'];
                                                    $id_mitra= $data['id_mitra'];
                                                    $keterangan= $data['keterangan'];
                                                    $harga= $data['harga'];
                                                    //Format Rupiah
                                                    $HargaLayanan = "Rp " . number_format($harga,0,',','.');
                                                    //Buka data mitra
                                                    $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                                                    $DataMitra = mysqli_fetch_array($QryMitra);
                                                    if(empty($DataMitra['id_mitra'])){
                                                        $Mitra='<span class="text-danger">None</span>';
                                                        $alamat_mitra='<span class="text-danger">None</span>';
                                                    }else{
                                                        $NamaMitra= $DataMitra['nama_mitra'];
                                                        $alamat_mitra= $DataMitra['alamat_mitra'];
                                                        $Mitra='<span class="text-info">'.$NamaMitra.'</span>';
                                                    }
                                                    echo '<tr>';
                                                    echo '  <td class="text-left">';
                                                    echo '      <b>'.$NamaMitra.'</b><br>';
                                                    echo '      '.$HargaLayanan.'<br>';
                                                    echo '      <small>'.$alamat_mitra.'</small><br>';
                                                    echo '      <a href="index.php?Page=Booking&id_mitra_layanan='.$id_mitra_layanan.'">';
                                                    echo '          Booking Sekarang';
                                                    echo '      </a>';
                                                    echo '  </td>';
                                                    echo '</tr>';
                                                    $no++;
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
    </div>
</div>
<!-- Contact End -->