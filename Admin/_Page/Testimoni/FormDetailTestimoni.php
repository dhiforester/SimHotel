<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_testimoni
    if(empty($_POST['id_testimoni'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          Access ID Data Undefined.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        //Buka data Testimoni
        $QryDetailTestimoni = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_testimoni='$id_testimoni'")or die(mysqli_error($Conn));
        $DataTestimoni = mysqli_fetch_array($QryDetailTestimoni);
        $id_testimoni= $DataTestimoni['id_testimoni'];
        $id_transaksi= $DataTestimoni['id_transaksi'];
        $testimoni= $DataTestimoni['testimoni'];
        $status= $DataTestimoni['status'];
        //Buka tanggal transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $tanggal= $DataTransaksi['tanggal'];
        $tanggal=strtotime($tanggal);
        $tanggal=date('d/m/y', $tanggal);
?>
    <input type="hidden" name="id_testimoni" id="id_testimoni_edit" value="<?php echo "$id_testimoni"; ?>">
    <div class="row">
        <div class="col-md-3 mt-3">
            <b>Tanggal</b>
        </div>
        <div class="col-md-9 mt-3">
            <?php echo "$tanggal"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mt-3">
            <b>Testimoni</b>
        </div>
        <div class="col-md-9 mt-3">
            <?php echo "$testimoni"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mt-3">
            <b>Status</b>
        </div>
        <div class="col-md-9 mt-3">
            <?php echo "$status"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="status">Update Status Testimoni</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status=="Draft"){echo "selected";} ?> value="Draft">Draft</option>
                <option <?php if($status=="Publish"){echo "selected";} ?> value="Publish">Publish</option>
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Menunggu Validasi</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditTestimoni">
            <small class="text-primary">Pastikan data yang anda input sudah sesuai</small>
        </div>
    </div>
<?php } ?>