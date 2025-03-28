<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //GetIdMitra
    if(!empty($_POST['GetIdMitra'])){
        $GetIdMitra=$_POST['GetIdMitra'];
    }else{
        $GetIdMitra="";
    }
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
        $OrderBy="id_kunjungan";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($GetIdMitra)){
        if(empty($keyword_by)){
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE nama like '%$keyword%' OR antrian like '%$keyword%' OR estimasi like '%$keyword%'"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE $keyword_by like '%$keyword%'"));
            }
        }
    }else{
        if(empty($keyword_by)){
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_mitra='$GetIdMitra'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE (id_mitra='$GetIdMitra') AND (nama like '%$keyword%' OR antrian like '%$keyword%' OR estimasi like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_mitra='$GetIdMitra"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_mitra='$GetIdMitra' AND $keyword_by like '%$keyword%'"));
            }
        }
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
            url     : "_Page/Booking/TabelBooking.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelBooking').html(data);

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
            url     : "_Page/Booking/TabelBooking.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelBooking').html(data);
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
                url     : "_Page/Booking/TabelBooking.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelBooking').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row mt-4">
    <?php
        if(empty($jml_data)){
            echo '<div class="col-md-12 mt-3 text-center">';
            echo '      <div class="text-dark">Belum Ada Data Booking</div>';
            echo '</div>';
        }else{
            $no = 1+$posisi;
            //KONDISI PENGATURAN MASING FILTER
            if(empty($GetIdMitra)){
                if(empty($keyword_by)){
                    if(empty($keyword)){
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }else{
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE nama like '%$keyword%' OR antrian like '%$keyword%' OR estimasi like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }
                }else{
                    if(empty($keyword)){
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }else{
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }
                }
            }else{
                if(empty($keyword_by)){
                    if(empty($keyword)){
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_mitra='$GetIdMitra' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }else{
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE (id_mitra='$GetIdMitra') AND (nama like '%$keyword%' OR antrian like '%$keyword%' OR estimasi like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }
                }else{
                    if(empty($keyword)){
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_mitra='$GetIdMitra' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }else{
                        $query = mysqli_query($Conn, "SELECT*FROM pelanggan_kunjungan WHERE id_mitra='$GetIdMitra' AND $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                    }
                }
            }
            while ($data = mysqli_fetch_array($query)) {
                $id_kunjungan= $data['id_kunjungan'];
                $id_pelanggan= $data['id_pelanggan'];
                $id_mitra= $data['id_mitra'];
                $id_hairstylist= $data['id_hairstylist'];
                $id_hairstylist_jadwal= $data['id_hairstylist_jadwal'];
                $id_mitra_layanan= $data['id_mitra_layanan'];
                $antrian= $data['antrian'];
                $estimasi= $data['estimasi'];
                $nama= $data['nama'];
                $datetime_daftar= $data['datetime_daftar'];
                $status= $data['status'];
                $strtotime=strtotime($datetime_daftar);
                $strtotime2=strtotime($estimasi);
                //Format datetime_daftar
                $datetime_daftar=date('d/m/y H:i', $strtotime);
                $estimasi=date('d/m/y H:i', $strtotime2);
                //Buka data mitra_layanan
                $QryLayanan = mysqli_query($Conn,"SELECT * FROM mitra_layanan WHERE id_mitra_layanan='$id_mitra_layanan'")or die(mysqli_error($Conn));
                $DataLayanan = mysqli_fetch_array($QryLayanan);
                if(!empty($DataLayanan['id_layanan'])){
                    $id_layanan= $DataLayanan['id_layanan'];
                    $keterangan_layanan= $DataLayanan['keterangan'];
                }else{
                    $id_layanan="0";
                    $keterangan_layanan="None";
                }
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
        ?>
            <div class="col-md-3 mt-3">
                <div class="card bg-white">
                    <div class="card-header">
                        <b class="text-dark">
                            <?php echo "$nama"; ?>
                        </b>
                    </div>
                    <div class="card-body text-dark">
                        <small class="credit">
                            <?php 
                                echo '<i class="bi bi-calendar"></i> '.$estimasi.'<br>'; 
                                echo '<i class="bi bi-ticket"></i> '.$id_kunjungan.' / '.$antrian.'<br>'; 
                                echo '<i class="bi bi-tags"></i> '.$status.'<br>'; 
                            ?>
                        </small>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100">
                            <button type="button" class="btn btn-sm btn-light" title="Detail Layanan" data-bs-toggle="modal" data-bs-target="#ModalDetailBooking" data-id="<?php echo "$id_kunjungan"; ?>">
                                <i class="bi bi-info-circle"></i> Detail
                            </button>
                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditBooking" data-id="<?php echo "$id_kunjungan"; ?>" title="Ubah Booking">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>  
                            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteBooking" data-id="<?php echo "$id_kunjungan,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Booking">
                                <i class="bi bi-x"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php $no++; }} ?>
</div>
<div class="row">
    <div class="col-md-12 text-center mt-3">
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