<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    date_default_timezone_set("Asia/Jakarta");
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
        $OrderBy="id_akses";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE nama like '%$keyword%' OR kontak like '%$keyword%' OR email like '%$keyword%' OR akses like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/Akses/TabelAkses.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelAkses').html(data);

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
            url     : "_Page/Akses/TabelAkses.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelAkses').html(data);
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
                url     : "_Page/Akses/TabelAkses.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelAkses').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Foto</b>
                            </th>
                            <th class="text-center">
                                <b>Nama</b>
                            </th>
                            <th class="text-center">
                                <b>Email</b>
                            </th>
                            <th class="text-center">
                                <b>Kontak</b>
                            </th>
                            <th class="text-center">
                                <b>Akses</b>
                            </th>
                            <th class="text-center">
                                <b>Option</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="7" class="text-center">Belum Ada Data Akses</td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM akses WHERE nama like '%$keyword%' OR kontak like '%$keyword%' OR email like '%$keyword%' OR akses like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM akses WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_akses= $data['id_akses'];
                                    $nama= $data['nama'];
                                    $kontak= $data['kontak'];
                                    $email= $data['email'];
                                    $password= $data['password'];
                                    $akses= $data['akses'];
                                    if($akses=="Admin"){
                                        $LabelAkses='<span class="badge badge-danger">Admin</span>';
                                    }else{
                                        if($akses=="Customer Service"){
                                            $LabelAkses='<span class="badge badge-success">Customer Service</span>';
                                        }else{
                                            if($akses=="Manajer"){
                                                $LabelAkses='<span class="badge badge-primary">Manajer</span>';
                                            }else{
                                                $LabelAkses='<span class="badge badge-dark">None</span>';
                                            }
                                        }
                                    }
                                    if(empty($data['foto'])){
                                        $foto="No-Image.png";
                                    }else{
                                        $foto= $data['foto'];
                                    }
                            ?>
                        <tr>
                            <td class="text-center text-xs">
                                <?php echo "$no" ?>
                            </td>
                            <td class="text-center text-xs">
                                <img src="assets\img\akses/<?php echo "$foto" ?>" alt="" width="50px" height="50px">
                            </td>
                            <td class="text-left text-xs" align="left">
                                <?php echo "$nama" ?>
                            </td>
                            <td class="text-left text-xs" align="left">
                                <?php echo "$email" ?>
                            </td>
                            <td class="text-left text-xs" align="left">
                                <?php echo "$kontak" ?>
                            </td>
                            <td class="text-left text-xs">
                                <?php echo "$LabelAkses" ?>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Ubah Password Akses">
                                        <i class="bi bi-key"></i>
                                    </button> 
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditAkses" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit User Akses">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>  
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteAkses" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus User Akses">
                                        <i class="bi bi-x"></i>
                                    </button>   
                                </div>
                            </td>
                        </tr>
                        <?php
                                    $no++; 
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center">
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