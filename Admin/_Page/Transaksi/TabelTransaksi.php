<?php
    //koneksi dan session
    date_default_timezone_set("Asia/Jakarta");
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="10";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
        if($ShortBy=="ASC"){
            $NextShort="DESC";
        }else{
            $NextShort="ASC";
        }
    }else{
        $ShortBy="DESC";
        $NextShort="ASC";
    }
    //OrderBy
    if(!empty($_POST['OrderBy'])){
        $OrderBy=$_POST['OrderBy'];
    }else{
        $OrderBy="id_transaksi";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword)){
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR jumlah like '%$keyword%' OR status_pembayaran like '%$keyword%' OR status_kamar like '%$keyword%'"));
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelTransaksi.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelTransaksi').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelTransaksi.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelTransaksi').html(data);
            }
        })
    });
    <?php 
        $JmlHalaman =ceil($jml_data/$batas); 
        $a=1;
        $b=$JmlHalaman;
        for ( $i =$a; $i<=$b; $i++ ){
    ?>
        //ketika klik page number
        $('#PageNumber<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumber<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Transaksi/TabelTransaksi.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelTransaksi').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row">
    <?php
        if(empty($jml_data)){
            echo '<div class="col-md-12">';
            echo '  <div class="card">';
            echo '      <div class="card-body text-center text-danger">Belum Ada Data Transaksi</div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $no = 1+$posisi;
            //KONDISI PENGATURAN MASING FILTER
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR jumlah like '%$keyword%' OR status_pembayaran like '%$keyword%' OR status_kamar like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
            while ($data = mysqli_fetch_array($query)) {
                $id_transaksi= $data['id_transaksi'];
                $id_kamar= $data['id_kamar'];
                $id_pelanggan= $data['id_pelanggan'];
                $tanggal= $data['tanggal'];
                $jumlah= $data['jumlah'];
                $biaya_adm= $data['biaya_adm'];
                $ppn= $data['ppn'];
                $total= $data['total'];
                $metode= $data['metode'];
                $status_pembayaran= $data['status_pembayaran'];
                $total = "Rp " . number_format($jumlah,0,',','.');
                //Buka data Pelanggan
                $QryPelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
                $DataPelanggan = mysqli_fetch_array($QryPelanggan);
                if(!empty($DataPelanggan['id_pelanggan'])){
                    $id_pelanggan= $DataPelanggan['id_pelanggan'];
                    $nama= $DataPelanggan['nama'];
                }else{
                    $id_pelanggan="";
                    $nama="";
                }
                $strtotime=strtotime($tanggal);
                $tanggal=date('d/m/Y', $strtotime);
                //Buka data kamar
                $Qry = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_kamar'")or die(mysqli_error($Conn));
                $data = mysqli_fetch_array($Qry);
                $id_kamar= $data['id_kamar'];
                $id_kategori= $data['id_kategori'];
                $kategori= $data['kategori'];
                $nama_kamar= $data['nama_kamar'];
    ?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <b class="text-dark"><?php echo "# $id_transaksi ($tanggal)"; ?></b><br>
                        <small class="text-dark">
                            <?php 
                                echo '<i class="bi bi-building"></i> '.$nama_kamar.'<br>'; 
                                echo '<i class="bi bi-person-circle"></i> '.$nama.'<br>'; 
                                echo '<i class="bi bi-coin-cash"></i> '.$total.' ('.$status_pembayaran.')<br>'; 
                            ?>
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group w-100">
                            <a href="javascript:void(0);"  class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDetailTransaksi" data-id="<?php echo "$id_transaksi,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>">
                                <i class="bi bi-info-circle"></i> Detail
                            </a> 
                            <a href="javascript:void(0);"  class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditStatusTransaksi" data-id="<?php echo "$id_transaksi"; ?>">
                                <i class="bi bi-pencil"></i> Edit
                            </a>  
                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteTransaksi" data-id="<?php echo "$id_transaksi,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>">
                                <i class="bi bi-x"></i> Hapus
                            </button>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $no++; }} ?>
</div>
<div class="row mt-4 mb-4">
    <div class="col-md-12 text-center">
        <div class="btn-group shadow-0" role="group" aria-label="Basic example">
            <?php
                //Mengatur Halaman
                $JmlHalaman = ceil($jml_data/$batas); 
                $JmlHalaman_real = ceil($jml_data/$batas); 
                $prev=$page-1;
                $next=$page+1;
                if($next>$JmlHalaman){
                    $next=$page;
                }else{
                    $next=$page+1;
                }
                if($prev<"1"){
                    $prev="1";
                }else{
                    $prev=$page-1;
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="PrevPage" value="<?php echo $prev;?>">
                <span aria-hidden="true">«</span>
            </button>
            <?php 
                //Navigasi nomor
                if($JmlHalaman>3){
                    if($page>=2){
                        $a=$page-1;
                        $b=$page+1;
                        if($JmlHalaman<=$b){
                            $a=$page-1;
                            $b=$JmlHalaman;
                        }
                    }else{
                        $a=1;
                        $b=$page+1;
                        if($JmlHalaman<=$b){
                            $a=1;
                            $b=$JmlHalaman;
                        }
                    }
                }else{
                    $a=1;
                    $b=$JmlHalaman;
                }
                for ( $i =$a; $i<=$b; $i++ ){
                    if($page=="$i"){
                        echo '<button class="btn btn-sm btn-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPage" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>
