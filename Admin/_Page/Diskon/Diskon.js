$('#MenampilkanTabelDiskon').html("Loading...");
$('#MenampilkanTabelDiskon').load("_Page/Diskon/TabelDiskon.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelDiskon').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/TabelDiskon.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelDiskon').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelDiskon').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/TabelDiskon.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelDiskon').html(data);
        }
    });
});
$('#ProsesFilterDiskon').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelDiskon').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/TabelDiskon.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelDiskon').html(data);
            $('#ModalFilterDiskon').modal('hide');
        }
    });
});
//Modal Pilih Layanan
$('#ModalPilihLayanan').on('show.bs.modal', function (e) {
    $('#MenampilkanDataLayanan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/TabelLayanan.php',
        success     : function(data){
            $('#MenampilkanDataLayanan').html(data);
        }
    });
});

//Tambah Diskon
$('#ModalTambahDiskon').on('show.bs.modal', function (e) {
    var id_layanan = $(e.relatedTarget).data('id');
    $('#FormTambahDiskon').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/FormTambahDiskon.php',
        data        : {id_layanan: id_layanan},
        success     : function(data){
            $('#FormTambahDiskon').html(data);
        }
    });
});

//Edit Diskon
$('#ModalEditDiskon').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_diskon = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditDiskon').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/FormEditDiskon.php',
        data        : {id_diskon: id_diskon},
        success     : function(data){
            $('#FormEditDiskon').html(data);
            //Proses Tambah Diskon
            $('#ProsesEditDiskon').submit(function(){
                $('#NotifikasiEditDiskon').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditDiskon')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Diskon/ProsesEditDiskon.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditDiskon').html(data);
                        var NotifikasiEditDiskonBerhasil=$('#NotifikasiEditDiskonBerhasil').html();
                        if(NotifikasiEditDiskonBerhasil=="Success"){
                            $('#MenampilkanTabelDiskon').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Diskon/TabelDiskon.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelDiskon').html(data);
                                    $('#ModalEditDiskon').modal('hide');
                                    swal("Good Job!", "Edit Diskon Data Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Diskon
$('#ModalDeleteDiskon').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_diskon = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteDiskon').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/FormDeleteDiskon.php',
        data        : {id_diskon: id_diskon},
        success     : function(data){
            $('#FormDeleteDiskon').html(data);
            //Konfirmasi Hapus Diskon
            $('#KonfirmasiHapusDiskon').click(function(){
                $('#NotifikasiHapusDiskon').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Diskon/ProsesHapusDiskon.php',
                    data        : {id_diskon: id_diskon},
                    success     : function(data){
                        $('#NotifikasiHapusDiskon').html(data);
                        var NotifikasiHapusDiskonBerhasil=$('#NotifikasiHapusDiskonBerhasil').html();
                        if(NotifikasiHapusDiskonBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Diskon/TabelDiskon.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelDiskon').html(data);
                                    $('#ModalDeleteDiskon').modal('hide');
                                    swal("Good Job!", "Hapus Layanan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Pilih Layanan
$('#ModalDiskonLayananTidakLaku').on('show.bs.modal', function (e) {
    $('#FormDiskonLayananTidakLaku').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Diskon/FormDiskonLayananTidakLaku.php',
        success     : function(data){
            $('#FormDiskonLayananTidakLaku').html(data);
            $('#ProsesTambahDiskonLayananTidakLaku').submit(function(){
                $('#NotifikasiTambahTidakLaku').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahDiskonLayananTidakLaku')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Diskon/ProsesTambahDiskonLayananTidakLaku.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahTidakLaku').html(data);
                        var NotifikasiTambahTidakLakuBerhasil=$('#NotifikasiTambahTidakLakuBerhasil').html();
                        if(NotifikasiTambahTidakLakuBerhasil=="Success"){
                            var ProsesBatas = $('#ProsesBatas').serialize();
                            $('#MenampilkanTabelDiskon').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Diskon/TabelDiskon.php',
                                data 	    :  {ProsesBatas},
                                success     : function(data){
                                    $('#MenampilkanTabelDiskon').html(data);
                                    window.location.href = "index.php?Page=Diskon";
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});