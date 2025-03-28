<?php
    //Koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        if(empty($DataTransaksi['id_transaksi'])){
            echo '<span class="text-danger">ID Transaksi Tidak Valid!</span>';
        }else{
            $status_pembayaran= $DataTransaksi['status_pembayaran'];
            $status_kamar= $DataTransaksi['status_kamar'];
?>
    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi;?>">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                <option <?php if($status_pembayaran==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status_pembayaran=="Lunas"){echo "selected";} ?> value="Lunas">Lunas</option>
                <option <?php if($status_pembayaran=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status_pembayaran=="Batal"){echo "selected";} ?> value="Batal">Batal</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="status_kamar">Status Kamar</label>
            <select name="status_kamar" id="status_kamar" class="form-control">
                <option <?php if($status_kamar==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status_kamar=="Batal"){echo "selected";} ?> value="Batal">Batal</option>
                <option <?php if($status_kamar=="Booked"){echo "selected";} ?> value="Booked">Booked</option>
                <option <?php if($status_kamar=="Checkin"){echo "selected";} ?> value="Checkin">Checkin</option>
                <option <?php if($status_kamar=="Checkout"){echo "selected";} ?> value="Checkout">Checkout</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditStatusTransaksi">
            <span class="text-primary">Pastikan Status Yang Anda Pilih Sudah Sesuai</span>
        </div>
    </div>
<?php
        }
    }
?>