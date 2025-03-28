$('#MenampilkanTabelAkses').html("Loading...");
$('#MenampilkanTabelAkses').load("_Page/Akses/TabelAkses.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilter').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormFilter.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilter').html(data);
        }
    });
});
$('#ProsesFilterAkses').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
            $('#ModalFilterAkses').modal('hide');
        }
    });
});
//Tambah Akses
$('#ModalTambahAkses').on('show.bs.modal', function (e) {
    $('#FormTambahAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormTambahAkses.php',
        success     : function(data){
            $('#FormTambahAkses').html(data);
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
            //Kondisi ketika akses dipilih
            $('#akses').change(function(){
                var akses = $('#akses').val();
                if(akses==""){
                    $("#grup_akses").prop("disabled", false);
                }else{
                    $("#grup_akses").prop("disabled", true);
                }
            });
        }
    });
});
//Proses Tambah Akses
$('#ProsesTambahAkses').submit(function(){
    $('#NotifikasiTambahAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesTambahAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahAkses').html(data);
            var NotifikasiTambahAksesBerhasil=$('#NotifikasiTambahAksesBerhasil').html();
            if(NotifikasiTambahAksesBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Edit Akses
$('#ModalEditAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormEditAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormEditAkses').html(data);
            //Proses Tambah Akses
            $('#ProsesEditAkses').submit(function(){
                $('#NotifikasiEditAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditAkses')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesEditAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditAkses').html(data);
                        var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
                        if(NotifikasiEditAksesBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalEditAkses').modal('hide');
                                    swal("Good Job!", "Edit Access Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Ubah Password
$('#ModalUbahPassword').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormUbahPassword').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahPassword.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahPassword').html(data);
            //Kondisi saat tampilkan password
            $('#TampilkanPassword2').click(function(){
                if($(this).is(':checked')){
                    $('#password1_edit').attr('type','text');
                    $('#password2_edit').attr('type','text');
                }else{
                    $('#password1_edit').attr('type','password');
                    $('#password2_edit').attr('type','password');
                }
            });
            //Proses Ubah Password
            $('#ProsesUbahPassword').submit(function(){
                $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesUbahPassword')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesUbahPassword.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahPassword').html(data);
                        var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
                        if(NotifikasiUbahPasswordBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalUbahPassword').modal('hide');
                                    swal("Good Job!", "Ubah Password Akses Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Ubah Level Akses
$('#ModalUbahLevel').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormUbahLevel').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahLevel.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahLevel').html(data);
            //Proses Ubah Level
            $('#ProsesUbahLevel').submit(function(){
                $('#NotifikasiUbahLevel').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesUbahLevel')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesUbahLevel.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahLevel').html(data);
                        var NotifikasiUbahLevelBerhasil=$('#NotifikasiUbahLevelBerhasil').html();
                        if(NotifikasiUbahLevelBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalUbahLevel').modal('hide');
                                    swal("Good Job!", "Ubah Level Akses Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Ubah Status Akses
$('#ModalUbahStatusAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormUbahStatusAkes').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahStatusAkes.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahStatusAkes').html(data);
            //Proses Ubah Level
            $('#ProsesUbahStatusAkses').submit(function(){
                $('#NotifikasiUbahStatusAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesUbahStatusAkses')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesUbahStatusAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahStatusAkses').html(data);
                        var NotifikasiUbahStatusAksesBerhasil=$('#NotifikasiUbahStatusAksesBerhasil').html();
                        if(NotifikasiUbahStatusAksesBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalUbahStatusAkses').modal('hide');
                                    swal("Good Job!", "Ubah Status Akses Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Akses
$('#ModalDeleteAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormDeleteAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormDeleteAkses').html(data);
            //Konfirmasi Hapus akses
            $('#KonfirmasiHapusAkses').click(function(){
                $('#NotifikasiHapusAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesHapusAkses.php',
                    data        : {id_akses: id_akses},
                    success     : function(data){
                        $('#NotifikasiHapusAkses').html(data);
                        var NotifikasiHapusAksesBerhasil=$('#NotifikasiHapusAksesBerhasil').html();
                        if(NotifikasiHapusAksesBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalDeleteAkses').modal('hide');
                                    swal("Good Job!", "Delete Access Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});