<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_layanan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Buku/Produk Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_layanan=$_POST['id_layanan'];
        //Buka data supplier
        $QryBarang = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_layanan'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $id_layanan= $DataBarang['id_kamar'];
        $nama_layanan= $DataBarang['nama_kamar'];
        $kategori= $DataBarang['kategori'];
        $harga= $DataBarang['harga'];
        $deskripsi= $DataBarang['deskripsi'];
        $HargaRp = "Rp " . number_format($harga,0,',','.');
?>
    <script>
        //Proses Tambah Diskon
        $('#ProsesTambahDiskon').submit(function(){
            $('#NotifikasiTambahDiskon').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
            var form = $('#ProsesTambahDiskon')[0];
            var data = new FormData(form);
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Diskon/ProsesTambahDiskon.php',
                data 	    :  data,
                cache       : false,
                processData : false,
                contentType : false,
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#NotifikasiTambahDiskon').html(data);
                    var NotifikasiTambahDiskonBerhasil=$('#NotifikasiTambahDiskonBerhasil').html();
                    if(NotifikasiTambahDiskonBerhasil=="Success"){
                        $('#MenampilkanTabelDiskon').html("Loading...");
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Diskon/TabelDiskon.php',
                            success     : function(data){
                                $('#MenampilkanTabelDiskon').html(data);
                                $('#ModalTambahDiskon').modal('hide');
                                swal("Good Job!", "Tambah Diskon Berhasil!", "success");
                            }
                        });
                    }
                }
            });
        });
    </script>
    <input type="hidden" name="id_layanan" id="id_layanan" value="<?php echo $id_layanan;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_layanan">Nama Layanan</label>
            <input type="text" readonly name="nama_layanan" id="nama_layanan" class="form-control" value="<?php echo "$nama_layanan"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="periode_awal">Periode Awal</label>
            <input type="date" name="periode_awal" id="periode_awal" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="periode_akhir">Periode Akhir</label>
            <input type="date" name="periode_akhir" id="periode_akhir" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="diskon">Diskon</label>
            <input type="number" min="0" name="diskon" id="diskon" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiTambahDiskon">
            <div class="alert alert-primary" role="alert">
                <span class="text-primary">Pastikan bahwa informasi diskon yang anda masukan sudah benar</span>
            </div>
        </div>
    </div>
<?php } ?>