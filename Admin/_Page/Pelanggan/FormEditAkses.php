<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_akses'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Akses Tidak Dapat Ditangkap Oleh Sistem.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $id_mitra = $DataDetailAkses['id_mitra'];
        $nama_akses= $DataDetailAkses['nama_akses'];
        $kontak_akses= $DataDetailAkses['kontak_akses'];
        $email_akses = $DataDetailAkses['email_akses'];
        $password= $DataDetailAkses['password'];
        $Akses= $DataDetailAkses['akses'];
        $gambar= $DataDetailAkses['image_akses'];
        if(empty($gambar)){
            $gambar="No-Image.png";
        }else{
            $gambar="$gambar";
        }
        $akses= $DataDetailAkses['akses'];
        $status= $DataDetailAkses['status'];
        $datetime_daftar= $DataDetailAkses['datetime_daftar'];
        $datetime_update= $DataDetailAkses['datetime_update'];
        $registration= $datetime_daftar;
        $updatetime=$datetime_update;
?>
    <input type="hidden" name="id_akses" id="id_akses_edit" value="<?php echo "$id_akses"; ?>">
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="nama_akses">Nama Lengkap</label>
            <input type="text" name="nama_akses" id="nama_akses_edit" class="form-control" value="<?php echo "$nama_akses"; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="kontak_akses">Nomor Kontak</label>
            <input type="text" name="kontak_akses" id="kontak_akses_edit" class="form-control" value="<?php echo "$kontak_akses"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="email_akses">Alamat Email</label>
            <input type="email" name="email_akses" id="email_akses_edit" class="form-control" value="<?php echo "$email_akses"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="status">Status</label>
            <select name="status" id="status_edit" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Choose..</option>
                <option <?php if($status=="Active"){echo "selected";} ?> value="Active">Active</option>
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Block"){echo "selected";} ?> value="Block">Block</option>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="image_akses">Photo Profile</label>
            <input type="file" name="image_akses" id="image_akses_edit" class="form-control">
            <small class="credit">Maksimal File 2 Mb (PNG, JPG, JPEG, GIF)</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditAkses">
            <small class="text-primary">Pastikan data yang anda input sudah benar</small>
        </div>
    </div>
<?php } ?>