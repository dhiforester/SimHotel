<?php
    //koneksi
    include "../../_Config/Connection.php";
    //Tangkap periode1
    if(empty($_POST['periode1'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger">';
        echo '          Periode Awal Tidak Boleh Kosong';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
       //Tangkap periode2
        if(empty($_POST['periode2'])){
            echo '<div class="card-body">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center text-danger">';
            echo '          Periode Akhir Tidak Boleh Kosong';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $periode2=$_POST['periode2'];
            $periode1=$_POST['periode1'];
?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><b>No</b></th>
                                                <th class="text-center"><b>Tanggal</b></th>
                                                <th class="text-center"><b>Pelanggan</b></th>
                                                <th class="text-center"><b>Kamar</b></th>
                                                <th class="text-center"><b>Jumlah</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                //Data Kategori Transaksi
                                                $NomorTransaksi = 1;
                                                $JumlahTransaksi=0;
                                                $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_transaksi ASC");
                                                while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                                    $id_transaksi= $DataTransaksi['id_transaksi'];
                                                    $id_pelanggan= $DataTransaksi['id_pelanggan'];
                                                    $id_kamar= $DataTransaksi['id_kamar'];
                                                    $tanggal= $DataTransaksi['tanggal'];
                                                    $jumlah= $DataTransaksi['jumlah'];
                                                    $jumlahRp = "Rp " . number_format($jumlah,2,',','.');
                                                    $JumlahTransaksi=$JumlahTransaksi+$jumlah;
                                                     //Buka data pelanggan
                                                    $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
                                                    $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
                                                    $id_pelanggan= $Datapelanggan['id_pelanggan'];
                                                    $nama_pelanggan= $Datapelanggan['nama'];
                                                      //Buka data kamar
                                                    $Qry = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_kamar'")or die(mysqli_error($Conn));
                                                    $data = mysqli_fetch_array($Qry);
                                                    $nama_kamar= $data['nama_kamar'];
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$NomorTransaksi.'</td>';
                                                    echo '  <td class="text-left">'.$tanggal.'</td>';
                                                    echo '  <td class="text-left">'.$nama_pelanggan.'</td>';
                                                    echo '  <td class="text-left">'.$nama_kamar.'</td>';
                                                    echo '  <td class="text-right">'.$jumlahRp.'</td>';
                                                    echo '</tr>';
                                                    $NomorTransaksi++;
                                                }
                                                $JumlahTransaksiRp = "Rp " . number_format($JumlahTransaksi,2,',','.');
                                                echo '<tr>';
                                                echo '  <td class="text-left"></td>';
                                                echo '  <td class="text-left" colspan="3">JUMLAH TOTAL</td>';
                                                echo '  <td class="text-left">'.$JumlahTransaksiRp.'</td>';
                                                echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="_Page/Laporan/CetakRekapitulasiTransaksi.php?periode1=<?php echo "$periode1"; ?>&periode2=<?php echo "$periode2"; ?>" class="btn btn-md btn-dark btn-rounded">
                                    <i class="bi bi-printer"></i> Cetak
                                </a>
                            </div>
                        </div>
                    </div>
<?php
        }
    }
?>