<?php
    //Menangkap Get
    if(empty($_GET['id_mitra'])){
        $id_mitra="";
    }else{
        $id_mitra=$_GET['id_mitra'];
    }
    if(empty($_GET['id_hairstylist'])){
        $id_hairstylist="";
    }else{
        $id_hairstylist=$_GET['id_hairstylist'];
    }
    if(empty($_GET['id_mitra_layanan'])){
        $id_mitra_layanan="";
    }else{
        $id_mitra_layanan=$_GET['id_mitra_layanan'];
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Booking</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Form Booking</span>
    </h2>
    <form action="javascript:void(0);" id="ProsesBooking">
        <div class="row px-xl-5">
            <div class="col col-12 p-30 bg-light">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <label for="id_mitra"><b>Mitra Cukur Rambut</b></label>
                        <select name="id_mitra" id="id_mitra" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihMitra">
                            <option value="">Pilih</option>
                            <?php
                                if(!empty($_GET['id_mitra'])){
                                    //Buka Data Mitra
                                    $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                                    $DataMitra = mysqli_fetch_array($QryMitra);
                                    $nama_mitra= $DataMitra['nama_mitra'];
                                    echo'<option selected value="'.$id_mitra.'">'.$nama_mitra.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <label for="id_mitra_layanan"><b>Layanan</b></label>
                        <select name="id_mitra_layanan" id="id_mitra_layanan" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihLayanan">
                            <option value="">Pilih</option>
                            <?php
                                if(!empty($_GET['id_mitra'])){
                                    $query = mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_mitra='$id_mitra'");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $IdMitraLayanan= $data['id_mitra_layanan'];
                                        $IdLayanan= $data['id_layanan'];
                                        $KeteranganLayanan= $data['keterangan'];
                                        //Buka Data Layanan
                                        $QryLayanan = mysqli_query($Conn,"SELECT * FROM layanan WHERE id_layanan='$IdLayanan'")or die(mysqli_error($Conn));
                                        $DataLayanan = mysqli_fetch_array($QryLayanan);
                                        if(!empty($DataLayanan['id_layanan'])){
                                            $NamaLayanan= $DataLayanan['nama_layanan'];
                                            if($IdMitraLayanan==$id_mitra_layanan){
                                                echo'<option selected value="'.$IdMitraLayanan.'">'.$KeteranganLayanan.'</option>';
                                            }else{
                                                echo'<option value="'.$IdMitraLayanan.'">'.$KeteranganLayanan.'</option>';
                                            }
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <label for="id_hairstylist"><b>Hairstyllist</b></label>
                        <select name="id_hairstylist" id="id_hairstylist" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihHairstylist">
                            <option value="">Pilih</option>
                            <?php
                                if(!empty($_GET['id_hairstylist'])){
                                    $Qry = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
                                    $Data = mysqli_fetch_array($Qry);
                                    $NamaHairstylist= $Data['nama'];
                                    echo'<option selected value="'.$id_hairstylist.'">'.$NamaHairstylist.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <label for="tanggal"><b>Tanggal Booking</b></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4" data-bs-toggle="modal" data-bs-target="#ModalPilihJamLayanan">
                        <label for="jam"><b>Jam Layanan</b></label>
                        <select name="jam" id="jam" class="form-control">
                            <option value="">Pilih</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4" id="NotifikasiBooking">
                        <span class="text-dark">
                            Pastikan informasi booking sudah sesuai.
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <button type="submit" class="btn btn-md btn-primary">
                            Lanjutkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Contact End -->