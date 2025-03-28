<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_hairstylist'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Tenaga Kesehatan Tidak Dapat Ditangkap Oleh Sistem';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_hairstylist=$_POST['id_hairstylist'];
        //Buka data mitra
        $Qry = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
        $data = mysqli_fetch_array($Qry);
        $id_hairstylist= $data['id_hairstylist'];
        $id_mitra= $data['id_mitra'];
?>
    <input type="hidden" name="id_hairstylist" id="id_hairstylist" class="form-control" value="<?php echo $id_hairstylist;?>">
    <input type="hidden" name="id_mitra" id="id_mitra" class="form-control" value="<?php echo $id_mitra;?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="hari">Hari</label>
            <select name="hari" id="hari" class="form-control">
                <option value="">Pilih</option>
                <option value="1">Senin</option>
                <option value="2">Selasa</option>
                <option value="3">Rabu</option>
                <option value="4">Kamis</option>
                <option value="5">Jumat</option>
                <option value="6">Sabtu</option>
                <option value="7">Minggu</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="quota">Quota</label>
            <input type="text" name="quota" id="quota" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Pilih</option>
                <option value="Active">Active</option>
                <option value="None">None</option>
            </select>
            <small>
                Ketika anda mengaktifkan status tersebut maka pelanggan bisa melakukan booking.
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiTambahJadwal">
            <small class="text-primary">Pastkan data yang anda input sudah benar</small>
        </div>
    </div>
<?php } ?>