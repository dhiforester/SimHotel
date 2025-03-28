<?php 
    //koneksi dan error
    include "../../_Config/Connection.php";
    //Kondisi Format
    if(empty($_POST['format'])){
        $format="";
    }else{
        $format=$_POST['format'];
        if($format=="Excel"){
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=data_pelanggan.xls");
        }
    }
    //Tangkap Parameter
    if(empty($_POST['keyword_by_export'])){
        $keyword_by="";
    }else{
        $keyword_by=$_POST['keyword_by_export'];
    }
    if(empty($_POST['keyword_export'])){
        $keyword="";
    }else{
        $keyword=$_POST['keyword_export'];
    }
    //Menghitung Jumlah
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan WHERE nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR datetime_daftar like '%$keyword%' OR datetime_update like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan WHERE $keyword_by like '%$keyword%'"));
        }
    }
?> 
<html>
    <head>
            <style type="text/css">
                table tr td {
                    border: 1px solid #666;
                    font-size:11px;
                    color:#333;
                    border-spacing: 0;
                    padding: 4px;
                }
            </style>
    </head>
    <body>
        <table cellspacing="0">
            <tr>
                <td align="center">
                    <b>No</b>
                </td>
                <td align="center">
                    <b>ID Pelanggan</b>
                </td>
                <td align="center">
                    <b>Nama</b>
                </td>
                <td align="center">
                    <b>Kontak</b>
                </td>
                <td align="center">
                    <b>Email</b>
                </td>
                <td align="center">
                    <b>Tanggal Daftar</b>
                </td>
                <td align="center">
                    <b>Update Terakhir</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="7">';
                    echo '      <span class="text-danger">Tidak Ada Data Pelanggan</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    //KONDISI PENGATURAN MASING FILTER
                    if(empty($keyword_by)){
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM pelanggan ORDER BY id_pelanggan ASC");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM pelanggan WHERE nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR datetime_daftar like '%$keyword%' OR datetime_update like '%$keyword%' ORDER BY id_pelanggan ASC");
                        }
                    }else{
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM pelanggan ORDER BY id_pelanggan ASC");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM pelanggan WHERE $keyword_by like '%$keyword%' ORDER BY id_pelanggan ASC");
                        }
                    }
                    while ($data = mysqli_fetch_array($query)) {
                        $id_pelanggan= $data['id_pelanggan'];
                        $nama= $data['nama'];
                        $kontak= $data['kontak'];
                        $email= $data['email'];
                        $datetime_daftar= $data['datetime_daftar'];
                        $datetime_update= $data['datetime_update'];
                        date_default_timezone_set('Asia/Jakarta');
                        $datetime_daftar= strtotime($datetime_daftar);
                        $datetime_update= strtotime($datetime_update);
                        $datetime_daftar=date('d/m/Y H:i', $datetime_daftar);
                        $datetime_update=date('d/m/Y H:i', $datetime_update);
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$no" ?>
                    </td>
                    <td align="left">
                        <?php echo "$id_pelanggan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kontak" ?>
                    </td>
                    <td align="left">
                        <?php echo "$email" ?>
                    </td>
                    <td align="left">
                        <?php echo "$datetime_daftar" ?>
                    </td>
                    <td align="left">
                        <?php echo "$datetime_update" ?>
                    </td>
                </tr>
                <?php
                            $no++; 
                        }
                    }
                ?>
        </table>
    </body>
</html>