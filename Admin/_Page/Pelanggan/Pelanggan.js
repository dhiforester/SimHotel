$('#MenampilkanTabelPelanggan').html("Loading...");
$('#MenampilkanTabelPelanggan').load("_Page/Pelanggan/TabelPelanggan.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPelanggan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/TabelPelanggan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPelanggan').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPelanggan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/TabelPelanggan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPelanggan').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilter').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormFilter.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilter').html(data);
        }
    });
});
$('#ProsesFilterPelanggan').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelPelanggan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/TabelPelanggan.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelPelanggan').html(data);
            $('#ModalFilterPelanggan').modal('hide');
        }
    });
});
//Export
$('#keyword_by_export').change(function(){
    var keyword_by_export = $('#keyword_by_export').val();
    $('#FormKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormKeyword.php',
        data 	    :  {keyword_by_export: keyword_by_export},
        success     : function(data){
            $('#FormKeyword').html(data);
        }
    });
});
//Tambah Pelanggan
$('#ModalTambahPelanggan').on('show.bs.modal', function (e) {
    $('#FormTambahPelanggan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormTambahPelanggan.php',
        success     : function(data){
            $('#FormTambahPelanggan').html(data);
            //Kondisi saat tampilkan password
            $('.form-check-input').click(function(){
                if($(this).is(':checked')){
                    $('#password1').attr('type','text');
                    $('#password2').attr('type','text');
                }else{
                    $('#password1').attr('type','password');
                    $('#password2').attr('type','password');
                }
            });
            //Proses Tambah Pelanggan
            $('#ProsesTambahPelanggan').submit(function(){
                $('#NotifikasiTambahPelanggan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahPelanggan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pelanggan/ProsesTambahPelanggan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahPelanggan').html(data);
                        var NotifikasiTambahPelangganBerhasil=$('#NotifikasiTambahPelangganBerhasil').html();
                        if(NotifikasiTambahPelangganBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Detail Pelanggan
$('#ModalDetailPelanggan').on('show.bs.modal', function (e) {
    var id_pelanggan = $(e.relatedTarget).data('id');
    $('#FormDetailPelanggan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormDetailPelanggan.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#FormDetailPelanggan').html(data);
        }
    });
});
//Edit Pelanggan
$('#ModalEditPelanggan').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pelanggan = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditPelanggan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormEditPelanggan.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#FormEditPelanggan').html(data);
            //Proses Tambah Pelanggan
            $('#ProsesEditPelanggan').submit(function(){
                $('#NotifikasiEditPelanggan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditPelanggan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pelanggan/ProsesEditPelanggan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPelanggan').html(data);
                        var NotifikasiEditPelangganBerhasil=$('#NotifikasiEditPelangganBerhasil').html();
                        if(NotifikasiEditPelangganBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pelanggan/TabelPelanggan.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelPelanggan').html(data);
                                    $('#ModalEditPelanggan').modal('hide');
                                    swal("Good Job!", "Edit Pelanggan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Edit Akses
$('#ModalEditAkses').on('show.bs.modal', function (e) {
    var id_pelanggan = $(e.relatedTarget).data('id');
    $('#FormEditAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormEditAkses.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#FormEditAkses').html(data);
            //Proses Edit Akses
            $('#ProsesEditAkses').submit(function(){
                $('#NotifikasiEditAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditAkses')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pelanggan/ProsesEditAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditAkses').html(data);
                        var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
                        if(NotifikasiEditAksesBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Edit Password
$('#ModalEditPassword').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pelanggan = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditPassword').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormEditPassword.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#FormEditPassword').html(data);
            //Kondisi saat tampilkan password
            $('#TampilkanPassword2').click(function(){
                if($(this).is(':checked')){
                    $('#password1').attr('type','text');
                    $('#password2').attr('type','text');
                }else{
                    $('#password1').attr('type','password');
                    $('#password2').attr('type','password');
                }
            });
            //Proses Edit Password
            $('#ProsesEditPassword').submit(function(){
                $('#NotifikasiEditPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditPassword')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pelanggan/ProsesEditPassword.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPassword').html(data);
                        var NotifikasiEditPasswordBerhasil=$('#NotifikasiEditPasswordBerhasil').html();
                        if(NotifikasiEditPasswordBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pelanggan/TabelPelanggan.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelPelanggan').html(data);
                                    $('#ModalEditPassword').modal('hide');
                                    swal("Good Job!", "Edit Pelanggan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Pelanggan
$('#ModalDeletePelanggan').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pelanggan = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeletePelanggan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/FormDeletePelanggan.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#FormDeletePelanggan').html(data);
            //Konfirmasi Hapus Pelanggan
            $('#KonfirmasiHapusPelanggan').click(function(){
                $('#NotifikasiHapusPelanggan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pelanggan/ProsesHapusPelanggan.php',
                    data        : {id_pelanggan: id_pelanggan},
                    success     : function(data){
                        $('#NotifikasiHapusPelanggan').html(data);
                        var NotifikasiHapusPelangganBerhasil=$('#NotifikasiHapusPelangganBerhasil').html();
                        if(NotifikasiHapusPelangganBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pelanggan/TabelPelanggan.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelPelanggan').html(data);
                                    $('#ModalDeletePelanggan').modal('hide');
                                    swal("Good Job!", "Hapus Pelanggan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Konfirmasi Pendaftaran Kunjungan
$('#ModalKonfirmasiPendaftaranKunjungan').on('show.bs.modal', function (e) {
    var id_pelanggan = $(e.relatedTarget).data('id');
    $('#KonfirmasiPendaftaranKunjungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/KonfirmasiPendaftaranKunjungan.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#KonfirmasiPendaftaranKunjungan').html(data);
        }
    });
});
//Modal Detail Kunjungan
$('#ModalDetailKunjungan').on('show.bs.modal', function (e) {
    var id_kunjungan = $(e.relatedTarget).data('id');
    $('#KonfirmasiDetailKunjungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/KonfirmasiDetailKunjungan.php',
        data        : {id_kunjungan: id_kunjungan},
        success     : function(data){
            $('#KonfirmasiDetailKunjungan').html(data);
        }
    });
});