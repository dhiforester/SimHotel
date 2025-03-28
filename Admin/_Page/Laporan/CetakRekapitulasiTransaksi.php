<?php
    if(empty($_GET['periode1'])){
        echo "Periode Awal Tidak Boleh Kosong!";
    }else{
        if(empty($_GET['periode2'])){
            echo "Periode Akhir Tidak Boleh Kosong!";
        }else{
            $periode1=$_GET['periode1'];
            $periode2=$_GET['periode2'];
            include '../../_Config/Connection.php';
            include '../../_Config/Session.php';
            include '../../_Config/SettingGeneral.php';
?>
<html>
    <head>
        <title>Laporan Rekapitulasi Transaksi</title>
        <style type="text/css">
            @page {
                margin-top: 1cm;
                margin-bottom: 1cm;
                margin-left: 1cm;
                margin-right: 1cm;
            }
            body {
                background-color: #FFF;
                font-family: arial;
            }
            table{
                border-collapse: collapse;
                margin-top:10px;
            }
            table.kostum tr td {
                border:none;
                color:#333;
                border-spacing: 0px;
                padding: 2px;
                border-collapse: collapse;
                font-size:12px;
            }
            table.data tr td {
                border: 1px solid #666;
                color:#333;
                border-spacing: 0px;
                padding: 10px;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td align="center">
                    <?php
                        echo '<img src="../../assets/img/'.$logo.'" width="100px"><br>';
                        echo "<h3>$title_page</h3>";
                        echo "<h4>LAPORAN TRANSAKSI</h4>";
                        echo "<b>Periode $periode1 s/d $periode2</b>";
                    ?>
                </td>
            </tr>
        </table>
        <table class="data" width="100%" cellspacing="0">
            <tr>
                <td><b class="sub-title">No</b></td>
                <td><b class="sub-title">Tanggal</b></td>
                <td><b class="sub-title">Pelanggan</b></td>
                <td><b class="sub-title">Jamar</b></td>
                <td><b class="sub-title">Jumlah</b></td>
            </tr>
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
        </table>
    </body>
</html>
<?php 
    }}
?>