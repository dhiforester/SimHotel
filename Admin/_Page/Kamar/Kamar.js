var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelKamar').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Kamar/TabelKamar.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelKamar').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelKamar').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/TabelKamar.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelKamar').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelKamar').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/TabelKamar.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelKamar').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilter').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Hairstylist/FormFilter.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilter').html(data);
        }
    });
});
$('#ProsesFilterHairstylist').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelKamar').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/TabelKamar.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelKamar').html(data);
            $('#ModalFilterHairstylist').modal('hide');
        }
    });
});
//Modal Kategori
$('#ModalTambahKategori').on('show.bs.modal', function (e) {
    $('#ListKategori').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/ListKategori.php',
        success     : function(data){
            $('#ListKategori').html(data);
        }
    });
    //Ketika di proses tambah kategor
    $('#ProsesTambahKategori').submit(function(){
        $('#ListKategori').html('Loading..');
        var form = $('#ProsesTambahKategori')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Kamar/ProsesTambahKategori.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#ListKategori').html(data);
                var NotifikasiTambahKategoriBerhasil=$('#NotifikasiTambahKategoriBerhasil').html();
                if(NotifikasiTambahKategoriBerhasil=="Success"){
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
});
//Modal Tambah Kamar
$('#ModalTambahKamar').on('show.bs.modal', function (e) {
    $('#SelectKategori').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/SelectKategori.php',
        success     : function(data){
            $('#SelectKategori').html(data);
        }
    });
});
//Proses Tambah Kamar
$('#ProsesTambahKamar').submit(function(){
    $('#NotifikasiTambahKamar').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahKamar')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/ProsesTambahKamar.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahKamar').html(data);
            var NotifikasiTambahKamarBerhasil=$('#NotifikasiTambahKamarBerhasil').html();
            if(NotifikasiTambahKamarBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Edit Kamar
$('#ModalEditKamar').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_kamar = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditKamar').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/FormEditKamar.php',
        data        : {id_kamar: id_kamar},
        success     : function(data){
            $('#FormEditKamar').html(data);
            //Proses Edit Kamar
            $('#ProsesEditKamar').submit(function(){
                $('#NotifikasiEditKamar').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditKamar')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Kamar/ProsesEditKamar.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditKamar').html(data);
                        var NotifikasiEditKamarBerhasil=$('#NotifikasiEditKamarBerhasil').html();
                        if(NotifikasiEditKamarBerhasil=="Success"){
                            $('#ModalEditKamar').modal('toggle');
                            $('#MenampilkanTabelKamar').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Kamar/TabelKamar.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelKamar').html(data);
                                    swal("Good Job!", "Edit Kamar Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});

//Hapus Kamar
$('#ModalHapusKamar').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_kamar = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormHapusKamar').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Kamar/FormHapusKamar.php',
        data        : {id_kamar: id_kamar},
        success     : function(data){
            $('#FormHapusKamar').html(data);
            //Konfirmasi Hapus Kamar
            $('#KonfirmasiHapusKamar').click(function(){
                $('#NotifikasiHapusKamar').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Kamar/ProsesHapusKamar.php',
                    data        : {id_kamar: id_kamar},
                    success     : function(data){
                        $('#NotifikasiHapusKamar').html(data);
                        var NotifikasiHapusKamarBerhasil=$('#NotifikasiHapusKamarBerhasil').html();
                        if(NotifikasiHapusKamarBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Kamar/TabelKamar.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelKamar').html(data);
                                    $('#ModalHapusKamar').modal('hide');
                                    swal("Good Job!", "Hapus Kamar Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Tambah Jadwal
$('#ModalTambahJadwal').on('show.bs.modal', function (e) {
    var id_hairstylist = $(e.relatedTarget).data('id');
    $('#FormTambahJadwal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Hairstylist/FormTambahJadwal.php',
        data        : {id_hairstylist: id_hairstylist},
        success     : function(data){
            $('#FormTambahJadwal').html(data);
            //Proses Tambah Jadwal
            $('#ProsesTambahJadwal').submit(function(){
                $('#NotifikasiTambahJadwal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahJadwal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Hairstylist/ProsesTambahJadwal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahJadwal').html(data);
                        var NotifikasiTambahJadwalBerhasil=$('#NotifikasiTambahJadwalBerhasil').html();
                        if(NotifikasiTambahJadwalBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Jadwal
$('#ModalEditJadwal').on('show.bs.modal', function (e) {
    var id_hairstylist_jadwal = $(e.relatedTarget).data('id');
    $('#FormEditJadwal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Hairstylist/FormEditJadwal.php',
        data        : {id_hairstylist_jadwal: id_hairstylist_jadwal},
        success     : function(data){
            $('#FormEditJadwal').html(data);
            //Proses Edit Jadwal
            $('#ProsesEditJadwal').submit(function(){
                $('#NotifikasiEditJadwal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditJadwal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Hairstylist/ProsesEditJadwal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditJadwal').html(data);
                        var NotifikasiEditJadwalBerhasil=$('#NotifikasiEditJadwalBerhasil').html();
                        if(NotifikasiEditJadwalBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus jadwal
$('#ModalHapusJadwal').on('show.bs.modal', function (e) {
    var id_hairstylist_jadwal = $(e.relatedTarget).data('id');
    $('#FormDeleteJadwal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Hairstylist/FormDeleteJadwal.php',
        data        : {id_hairstylist_jadwal: id_hairstylist_jadwal},
        success     : function(data){
            $('#FormDeleteJadwal').html(data);
            //Konfirmasi Hapus data
            $('#KonfirmasiHapusJadwal').click(function(){
                $('#NotifikasiHapusJadwal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Hairstylist/ProsesHapusJadwal.php',
                    data        : {id_hairstylist_jadwal: id_hairstylist_jadwal},
                    success     : function(data){
                        $('#NotifikasiHapusJadwal').html(data);
                        var NotifikasiHapusJadwalBerhasil=$('#NotifikasiHapusJadwalBerhasil').html();
                        if(NotifikasiHapusJadwalBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});