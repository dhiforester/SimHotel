var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelTransaksi').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelTransaksi.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelTransaksi').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
        }
    });
});
$('#ProsesFilterTransaksi').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
            $('#ModalFilterTransaksi').modal('hide');
        }
    });
});
//TAMBAH TRANSAKSI
var GetIdMitra = $('#id_mitra').val();
//Modal Pilih Mitra
$('#ModalPilihMitra').on('show.bs.modal', function (e) {
    $('#FormPilihMitra').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormPilihMitra.php',
        success     : function(data){
            $('#FormPilihMitra').html(data);
        }
    });
});
//Modal Pilih Mitra Untuk Tambah Transaksi
$('#ModalPilihMitra2').on('show.bs.modal', function (e) {
    $('#FormPilihMitra2').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormPilihMitra2.php',
        success     : function(data){
            $('#FormPilihMitra2').html(data);
        }
    });
});
//Modal Cari Pelanggan
$('#ModalCariPelanggan').on('show.bs.modal', function (e) {
    $('#keyword_pelanggan').val("");
    $('#TabelPelanggan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelPelanggan.php',
        success     : function(data){
            $('#TabelPelanggan').html(data);
        }
    });
    $('#ProsesCariPelanggan').submit(function(){
        var keyword_pelanggan = $('#keyword_pelanggan').val();
        $('#TabelPelanggan').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelPelanggan.php',
            data 	    :  {keyword_pelanggan: keyword_pelanggan},
            success     : function(data){
                $('#TabelPelanggan').html(data);
            }
        });
    });
});
//Menampilkan jumlah transaksi
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/HitungJumlahRincian2.php',
    data 	    :  {id_mitra: GetIdMitra},
    success     : function(data){
        $('#jumlah_transaksi').val(data);
    }
});
$('#MenampilkanTabelRincian').html('Loading...');
var GetIdPelanggan=$('#id_pelanggan').val();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelRincian.php',
    data 	    :  {id_mitra: GetIdMitra, id_pelanggan: GetIdPelanggan},
    success     : function(data){
        $('#MenampilkanTabelRincian').html(data);
    }
});
//Tambah Rincian
$('#ModalTambahRincian').on('show.bs.modal', function (e) {
    var id_pelanggan = $('#id_pelanggan').val();
    var id_mitra = $('#id_mitra').val();
    $('#FormTambahRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahRincian.php',
        data        : {id_pelanggan: id_pelanggan, id_mitra: id_mitra},
        success     : function(data){
            $('#FormTambahRincian').html(data);
            //Cari Hairstylist
            $('#id_hairstylist').click(function(){
                var estimasi = $('#estimasi').val();
                $('#id_hairstylist').html('<option value="">Loading...</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/OptionHairstylist.php',
                    data 	    :  {estimasi: estimasi, id_mitra: id_mitra},
                    success     : function(data){
                        $('#id_hairstylist').html(data);
                    }
                });
            });
            //Cari Jadwal Hairstylist
            $('#id_hairstylist_jadwal').click(function(){
                var estimasi = $('#estimasi').val();
                var id_mitra = $('#id_mitra').val();
                var id_hairstylist = $('#id_hairstylist').val();
                $('#id_hairstylist_jadwal').html('<option value="">Loading...</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/OptionHJadwalairstylist.php',
                    data 	    :  {estimasi: estimasi, id_mitra: id_mitra, id_hairstylist: id_hairstylist},
                    success     : function(data){
                        $('#id_hairstylist_jadwal').html(data);
                    }
                });
            });
            //Tampilkan Layanan
            $('#TampilkanLayanan').click(function(){
                var id_mitra = $('#id_mitra').val();
                $('#ListLayanan').html('<option value="">Loading...</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ListLayanan.php',
                    data 	    :  {id_mitra: id_mitra},
                    success     : function(data){
                        $('#ListLayanan').html(data);
                    }
                });
            });
        }
    });
});
//Proses Tambah Rincian Booking
$('#ProsesTambahRincian').submit(function(){
    var id_pelanggan = $('#id_pelanggan').val();
    var id_mitra = $('#id_mitra').val();
    $('#NotifikasiTambahRincian').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahRincian')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesTambahRincian.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahRincian').html(data);
            var NotifikasiTambahBookingBerhasil=$('#NotifikasiTambahBookingBerhasil').html();
            if(NotifikasiTambahBookingBerhasil=="Success"){
                $('#MenampilkanTabelRincian').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelRincian.php',
                    data 	    :  {id_mitra: id_mitra, id_pelanggan: id_pelanggan},
                    success     : function(data){
                        $('#MenampilkanTabelRincian').html(data);
                        $('#ModalTambahRincian').modal('hide');
                    }
                });
            }
        }
    });
});
$('#ModalDeleteTransaksiRincian').on('show.bs.modal', function (e) {
    var id_transaksi_rincian = $(e.relatedTarget).data('id');
    var id_pelanggan = $('#id_pelanggan').val();
    var id_mitra = $('#id_mitra').val();
    $('#FormDeleteRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeleteRincian.php',
        data        : {id_transaksi_rincian: id_transaksi_rincian},
        success     : function(data){
            $('#FormDeleteRincian').html(data);
            //Konfirmasi Hapus Rincian Transaksi
            $('#KonfirmasiHapusRincian').click(function(){
                $('#NotifikasiHapusRincian').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusRincian.php',
                    data        : {id_transaksi_rincian: id_transaksi_rincian},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiHapusRincian').html(data);
                        var NotifikasiHapusRincianBerhasil=$('#NotifikasiHapusRincianBerhasil').html();
                        if(NotifikasiHapusRincianBerhasil=="Success"){
                            $('#MenampilkanTabelRincian').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelRincian.php',
                                data 	    :  {id_mitra: id_mitra, id_pelanggan: id_pelanggan},
                                success     : function(data){
                                    $('#MenampilkanTabelRincian').html(data);
                                    $('#ModalDeleteTransaksiRincian').modal('hide');
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Proses Tambah Transaksi
$('#ProsesTambahTransaksi').submit(function(){
    $('#NotifikasiTambahTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahTransaksi')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesTambahTransaksi.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahTransaksi').html(data);
            var NotifikasiTambahTransaksiBerhasil=$('#NotifikasiTambahTransaksiBerhasil').html();
            if(NotifikasiTambahTransaksiBerhasil=="Success"){
                window.location.href = "index.php?Page=Transaksi";
            }
        }
    });
});
//Proses Edit Transaksi
$('#ProsesEditTransaksi').submit(function(){
    $('#NotifikasiEditTransaksi').html('<div class="alert alert-info text-center" role="alert"><div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div></div>');
    var form = $('#ProsesEditTransaksi')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesEditTransaksi.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditTransaksi').html(data);
            var NotifikasiEditTransaksiBerhasil=$('#NotifikasiEditTransaksiBerhasil').html();
            if(NotifikasiEditTransaksiBerhasil=="Success"){
                var UrlBack=$('#UrlBack').val();
                text = UrlBack.replace('amp;', "");
                text = UrlBack.replace('amp;', "");
                window.location.href = UrlBack;
            }
        }
    });
});

//Detail Transaksi
$('#ModalDetailTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    $('#FormDetailTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDetailTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDetailTransaksi').html(data);
        }
    });
});
//Hapus Transaksi
$('#ModalDeleteTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var keyword_by = pecah[6];
    $('#FormDeleteTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeleteTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDeleteTransaksi').html(data);
            //Ketika Konfirmasi Hapus Transaksi Di Click
            $('#KonfirmasiHapusTransaksi').click(function(){
                $('#NotifikasiHapusTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusTransaksi.php',
                    data        : {id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#NotifikasiHapusTransaksi').html(data);
                        var NotifikasiHapusTransaksiBerhasil=$('#NotifikasiHapusTransaksiBerhasil').html();
                        if(NotifikasiHapusTransaksiBerhasil=="Success"){
                            $('#MenampilkanTabelTransaksi').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelTransaksi.php',
                                data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: keyword_by, keyword: keyword},
                                success     : function(data){
                                    $('#MenampilkanTabelTransaksi').html(data);
                                    swal("Good Job!", "Hapus Transaksi Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Batalkan Transaksi
$('#ModalBatalkanTransaksi').on('show.bs.modal', function (e) {
    var GetIdMitra2 = $('#GetIdMitra').val();
    $('#FormBatalkanTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormBatalkanTransaksi.php',
        success     : function(data){
            $('#FormBatalkanTransaksi').html(data);
            //Ketika Konfirmasi Batalkan Transaksi Di Click
            $('#KonfirmasiBatalkanTransaksi').click(function(){
                $('#NotifikasiBatalkanTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesBatalkanTransaksi.php',
                    data        : {id_mitra: GetIdMitra2},
                    success     : function(data){
                        $('#NotifikasiBatalkanTransaksi').html(data);
                        var NotifikasiBatalkanTransaksiBerhasil=$('#NotifikasiBatalkanTransaksiBerhasil').html();
                        if(NotifikasiBatalkanTransaksiBerhasil=="Success"){
                            $('#ModalBatalkanTransaksi').modal('toggle');
                            $('#MenampilkanTabelRincian').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelRincian.php',
                                data 	    :  {id_mitra: GetIdMitra2},
                                success     : function(data){
                                    $('#MenampilkanTabelRincian').html(data);
                                    $.ajax({
                                        type 	    : 'POST',
                                        url 	    : '_Page/Transaksi/HitungJumlahRincian2.php',
                                        data 	    :  {id_mitra: GetIdMitra2},
                                        success     : function(data){
                                            $('#jumlah_transaksi').val(data);
                                        }
                                    });
                                    swal("Good Job!", "Hapus Rincian Tindakan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});

//DETAIL TRANSAKSI
var GetIdTransaksi=$('#GetIdTransaksi').html();
//Modal Edit Metode Transaksi
$('#ModalEditMetodeTransaksi').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormUbahMetodeTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormUbahMetodeTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormUbahMetodeTransaksi').html(data);
            //Proses Ubah Metode Transaksi
            $('#ProsesEditMetodeTransaksi').submit(function(){
                $('#NotifikasiEditMetodeTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditMetodeTransaksi')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditMetodeTransaksi.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditMetodeTransaksi').html(data);
                        var NotifikasiEditMetodeTransaksiBerhasil=$('#NotifikasiEditMetodeTransaksiBerhasil').html();
                        if(NotifikasiEditMetodeTransaksiBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Status Transaksi
$('#ModalEditStatusTransaksi').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormUbahStatusTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormEditStatusTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormUbahStatusTransaksi').html(data);
            //Proses Ubah Status Transaksi
            $('#ProsesEditStatusTransaksi').submit(function(){
                $('#NotifikasiEditStatusTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditStatusTransaksi')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditStatusTransaksi.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditStatusTransaksi').html(data);
                        var NotifikasiEditStatusTransaksiBerhasil=$('#NotifikasiEditStatusTransaksiBerhasil').html();
                        if(NotifikasiEditStatusTransaksiBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Pembayaran
$('#ModalEditPembayaran').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormUbahPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormEditPembayaran.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormUbahPembayaran').html(data);
            //Proses Ubah Pembayaran
            $('#ProsesEditPembayaran').submit(function(){
                $('#NotifikasiUbahPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditPembayaran')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditPembayaran.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahPembayaran').html(data);
                        var NotifikasiUbahPembayaranBerhasil=$('#NotifikasiUbahPembayaranBerhasil').html();
                        if(NotifikasiUbahPembayaranBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Tambah Rincian
$('#ModalTambahRincianDetail').on('show.bs.modal', function (e) {
    var id_pelanggan = $('#GetIdPelanggan').val();
    var id_mitra = $('#GetIdMitra').val();
    var id_transaksi = $('#GetIdTransaksi2').val();
    $('#FormTambahRincianDetail').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahRincianDetail.php',
        data        : {id_pelanggan: id_pelanggan, id_mitra: id_mitra, id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormTambahRincianDetail').html(data);
            $('#id_hairstylist').click(function(){
                var estimasi = $('#estimasi').val();
                $('#id_hairstylist').html('<option value="">Loading...</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/OptionHairstylist.php',
                    data 	    :  {estimasi: estimasi, id_mitra: id_mitra},
                    success     : function(data){
                        $('#id_hairstylist').html(data);
                    }
                });
            });
            //Cari Jadwal Hairstylist
            $('#id_hairstylist_jadwal').click(function(){
                var estimasi = $('#estimasi').val();
                var id_mitra = $('#id_mitra').val();
                var id_hairstylist = $('#id_hairstylist').val();
                $('#id_hairstylist_jadwal').html('<option value="">Loading...</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/OptionHJadwalairstylist.php',
                    data 	    :  {estimasi: estimasi, id_mitra: id_mitra, id_hairstylist: id_hairstylist},
                    success     : function(data){
                        $('#id_hairstylist_jadwal').html(data);
                    }
                });
            });
            //Tampilkan Layanan
            $('#TampilkanLayanan').click(function(){
                var id_mitra = $('#id_mitra').val();
                $('#ListLayanan').html('<option value="">Loading...</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ListLayanan.php',
                    data 	    :  {id_mitra: id_mitra},
                    success     : function(data){
                        $('#ListLayanan').html(data);
                    }
                });
            });
        }
    });
});
//Proses Tambah Rincian Booking
$('#ProsesTambahRincianDetail').submit(function(){
    $('#NotifikasiTambahRincianDetail').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahRincianDetail')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesTambahRincianDetail.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahRincianDetail').html(data);
            var NotifikasiTambahRincianDetailBerhasil=$('#NotifikasiTambahRincianDetailBerhasil').html();
            if(NotifikasiTambahRincianDetailBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Hapus Rincian Transaksi Detail
$('#ModalHapusRincianDetail').on('show.bs.modal', function (e) {
    var id_transaksi_rincian = $(e.relatedTarget).data('id');
    var id_pelanggan = $('#GetIdPelanggan').val();
    var id_mitra = $('#GetIdMitra').val();
    var id_transaksi = $('#GetIdTransaksi2').val();
    $('#FormHapusRincianDetail').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormHapusRincianDetail.php',
        data        : {id_transaksi_rincian: id_transaksi_rincian, id_pelanggan: id_pelanggan, id_mitra: id_mitra, id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormHapusRincianDetail').html(data);
            //Konfirmasi Hapus Rincian Transaksi Detail
            $('#KonfirmasiHapusRincianDetail').click(function(){
                $('#NotifikasiHapusRincianDetail').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusRincianDetail.php',
                    data        : {id_transaksi_rincian: id_transaksi_rincian, id_pelanggan: id_pelanggan, id_mitra: id_mitra, id_transaksi: id_transaksi},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiHapusRincianDetail').html(data);
                        var NotifikasiHapusRincianDetailBerhasil=$('#NotifikasiHapusRincianDetailBerhasil').html();
                        if(NotifikasiHapusRincianDetailBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Transaksi
$('#ModalDeleteTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeleteTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDeleteTransaksi').html(data);
            //Konfirmasi Hapus Transaksi
            $('#KonfirmasiHapusTransaksi').click(function(){
                $('#NotifikasiHapusTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusTransaksi.php',
                    data        : {id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#NotifikasiHapusTransaksi').html(data);
                        var NotifikasiHapusTransaksiBerhasil=$('#NotifikasiHapusTransaksiBerhasil').html();
                        if(NotifikasiHapusTransaksiBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelTransaksi.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelTransaksi').html(data);
                                    $('#ModalDeleteTransaksi').modal('hide');
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
