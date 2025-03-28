<script>
    <?php
        include "../../_Config/Connection.php";
        $QryKategori=mysqli_query($Conn, "SELECT*FROM kategori");
        while ($DataKategori = mysqli_fetch_array($QryKategori)) {
            $id_kategori= $DataKategori['id_kategori'];
    ?>
    $('#HapusKategori<?php echo  $id_kategori; ?>').click(function(){
        $('#HapusKategori<?php echo  $id_kategori; ?>').html('...');
        var id_kategori="<?php echo  $id_kategori; ?>";
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Kamar/ProsesHapusKategori.php',
            data        : {id_kategori: id_kategori},
            success     : function(data){
                $('#HapusKategori<?php echo  $id_kategori; ?>').html(data);
                var NotifikasiHapusKategori=$('#NotifikasiHapusKategori').html();
                if(NotifikasiHapusKategori=="Ok"){
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Kamar/ListKategori.php',
                        success     : function(data){
                            $('#ListKategori').html(data);
                        }
                    });
                }
            }
        });
    });
    <?php } ?>
</script>
<div class="table table-responsive">
    <table class="table table-hover">
        <tbody>
            <?php
                $QryKategori=mysqli_query($Conn, "SELECT*FROM kategori");
                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                    $id_kategori= $DataKategori['id_kategori'];
                    $kategori= $DataKategori['kategori'];
                    $foto= $DataKategori['foto'];
            ?>
                <tr>
                    <td>
                        <img src="assets/img/kamar/<?php echo $foto; ?>" width="30px"  height="30px">
                    </td>
                    <td>
                        <?php echo $kategori; ?>
                    </td>
                    <td align="right">
                        <button type="button" class="btn btn-danger btn-sm" id="<?php echo "HapusKategori$id_kategori"; ?>" title="Hapus Kategori">
                            <i class="bi bi-x"></i>
                        </button>  
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>