<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_akses'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          Access ID Data Undefined.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama= $DataDetailAkses['nama'];
        $kontak= $DataDetailAkses['kontak'];
        $email = $DataDetailAkses['email'];
        $password= $DataDetailAkses['password'];
        $akses= $DataDetailAkses['akses'];
        $foto= $DataDetailAkses['foto'];
        if(empty($foto)){
            $foto="No-Image.png";
        }else{
            $foto="$foto";
        }
?>
    <input type="hidden" name="id_akses" id="id_akses_edit" value="<?php echo "$id_akses"; ?>">
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="nama"><b>Nama Lengkap</b></label>
        </div>
        <div class="col-md-9">
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo "$nama"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="kontak"><b>Nomor Kontak</b></label>
        </div>
        <div class="col-md-9">
            <input type="text" name="kontak" id="kontak" class="form-control" placeholder="+62" value="<?php echo "$kontak"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="akses"><b>Akses</b></label>
        </div>
        <div class="col-md-9">
            <select name="akses" id="akses" class="form-control">
                <!-- <option <?php if($akses=="Admin"){echo "selected";} ?> value="Admin">Admin</option> -->
                <option <?php if($akses=="Customer Service"){echo "selected";} ?> value="Customer Service">Customer Service</option>
                <option <?php if($akses=="Manajer"){echo "selected";} ?> value="Manajer">Manajer</option>
            </select>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="foto"><b>Foto Profile</b></label>
        </div>
        <div class="col-md-9">
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="email"><b>Email</b></label>
        </div>
        <div class="col-md-9">
            <input type="email" name="email" id="email" class="form-control" placeholder="alamatemail@domain.com" value="<?php echo "$email"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditAkses">
            <small class="text-primary">Pastikan data yang anda input sudah sesuai</small>
        </div>
    </div>
<?php } ?>