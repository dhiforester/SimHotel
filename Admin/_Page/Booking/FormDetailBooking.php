<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_kunjungan
    if(empty($_POST['id_kunjungan'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Kunjungan Tidak Ditemukan.';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo ' <div class="modal-footer bg-info">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '              <i class="bi bi-x-circle"></i> Tutup';
        echo '          </button>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_kunjungan=$_POST['id_kunjungan'];
        //Buka data kunjungan
        $QryKunjungan = mysqli_query($Conn,"SELECT * FROM pelanggan_kunjungan WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
        $DataKunjungan = mysqli_fetch_array($QryKunjungan);
        $id_pelanggan = $DataKunjungan['id_pelanggan'];
        $id_mitra = $DataKunjungan['id_mitra'];
        $id_hairstylist = $DataKunjungan['id_hairstylist'];
        $id_hairstylist_jadwal = $DataKunjungan['id_hairstylist_jadwal'];
        $antrian = $DataKunjungan['antrian'];
        $estimasi = $DataKunjungan['estimasi'];
        $nama = $DataKunjungan['nama'];
        $datetime_daftar = $DataKunjungan['datetime_daftar'];
        $status = $DataKunjungan['status'];
        $strtotime=strtotime($datetime_daftar);
        $strtotime2=strtotime($estimasi);
        //Format datetime_daftar
        $datetime_daftar=date('d/m/y H:i', $strtotime);
        $estimasi=date('d/m/y H:i', $strtotime2);
        //Buka nama mitra
        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
        $DataMitra = mysqli_fetch_array($QryMitra);
        if(!empty($DataMitra['nama_mitra'])){
            $nama_mitra= $DataMitra['nama_mitra'];
        }else{
            $nama_mitra="Tidak Diketahui";
        }
        //Buka nama hairstylist
        $QryHairstylist = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
        $DataHairstylist = mysqli_fetch_array($QryHairstylist);
        if(!empty($DataHairstylist['nama'])){
            $NamaHairstylist= $DataHairstylist['nama'];
        }else{
            $NamaHairstylist="Tidak Diketahui";
        }
        //Buka Transaksi Rincian
        $QryRincian = mysqli_query($Conn,"SELECT * FROM  transaksi_rincian WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
        $DataRincian = mysqli_fetch_array($QryRincian);
        if(!empty($DataRincian['id_transaksi_rincian'])){
            $id_transaksi= $DataRincian['id_transaksi'];
        }else{
            $id_transaksi ="";
        }
        //Buka Pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM  transaksi_pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        if(!empty($DataPembayaran['id_pembayaran'])){
            $tagihan= $DataPembayaran['tagihan'];
            $StatusPembayaran= $DataPembayaran['status'];
            $TagihanRp = "Rp " . number_format($tagihan,0,',','.');
        }else{
            $TagihanRp ="";
            $StatusPembayaran="None";
        }
?>
    <table class="table table-responsive">
        <tbody>
            <tr>
                <td><b>Tanggal Daftar</b></td>
                <td><?php echo $datetime_daftar; ?></td>
            </tr>
            <tr>
                <td><b>Tanggal Layanan</b></td>
                <td><?php echo $estimasi; ?></td>
            </tr>
            <tr>
                <td><b>Nomor Antrian</b></td>
                <td><?php echo $antrian; ?></td>
            </tr>
            <tr>
                <td><b>Mitra</b></td>
                <td><?php echo $nama_mitra; ?></td>
            </tr>
            <tr>
                <td><b>Nama Pelanggan</b></td>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <td><b>Hairstylist</b></td>
                <td><?php echo $NamaHairstylist; ?></td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td><?php echo $status; ?></td>
            </tr>
            <tr>
                <td><b>Pembayaran</b></td>
                <td><?php echo $StatusPembayaran; ?></td>
            </tr>
        </tbody>
    </table>
<?php } ?>