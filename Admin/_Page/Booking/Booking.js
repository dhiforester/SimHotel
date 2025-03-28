var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelBooking').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Booking/TabelBooking.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelBooking').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBooking').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/TabelBooking.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBooking').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBooking').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/TabelBooking.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBooking').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilter').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormFilter.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilter').html(data);
        }
    });
});
$('#ProsesFilterBooking').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelBooking').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/TabelBooking.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelBooking').html(data);
            $('#ModalFilterBooking').modal('hide');
        }
    });
});
//Modal Pilih Mitra
$('#ModalPilihMitra').on('show.bs.modal', function (e) {
    $('#FormPilihMitra').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormPilihMitra.php',
        success     : function(data){
            $('#FormPilihMitra').html(data);
        }
    });
});
//Modal Cari Pelanggan
$('#ModalCariPelanggan').on('show.bs.modal', function (e) {
    $('#keyword_pelanggan').val("");
    $('#TabelPelanggan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/TabelPelanggan.php',
        success     : function(data){
            $('#TabelPelanggan').html(data);
        }
    });
    $('#ProsesCariPelanggan').submit(function(){
        var keyword_pelanggan = $('#keyword_pelanggan').val();
        $('#TabelPelanggan').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Booking/TabelPelanggan.php',
            data 	    :  {keyword_pelanggan: keyword_pelanggan},
            success     : function(data){
                $('#TabelPelanggan').html(data);
            }
        });
    });
});
//Cari Hairstylist
$('#id_hairstylist').click(function(){
    var estimasi = $('#estimasi').val();
    var id_mitra = $('#id_mitra').val();
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
//Proses Tambah Booking
$('#ProsesTambahBooking').submit(function(){
    $('#NotifikasiTambahBooking').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahBooking')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/ProsesTambahBooking.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahBooking').html(data);
            var NotifikasiTambahBookingBerhasil=$('#NotifikasiTambahBookingBerhasil').html();
            if(NotifikasiTambahBookingBerhasil=="Success"){
                window.location.href = "index.php?Page=Booking";
            }
        }
    });
});
//Detail Booking
$('#ModalDetailBooking').on('show.bs.modal', function (e) {
    var id_kunjungan= $(e.relatedTarget).data('id');
    $('#FormDetailBooking').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormDetailBooking.php',
        data        : {id_kunjungan: id_kunjungan},
        success     : function(data){
            $('#FormDetailBooking').html(data);
        }
    });
});
//Hapus Booking
$('#ModalDeleteBooking').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_kunjungan = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteBooking').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormDeleteBooking.php',
        data        : {id_kunjungan: id_kunjungan},
        success     : function(data){
            $('#FormDeleteBooking').html(data);
            //Konfirmasi Hapus Booking
            $('#KonfirmasiHapusBooking').click(function(){
                $('#NotifikasiHapusBooking').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesHapusBooking.php',
                    data        : {id_kunjungan: id_kunjungan},
                    success     : function(data){
                        $('#NotifikasiHapusBooking').html(data);
                        var NotifikasiHapusBookingBerhasil=$('#NotifikasiHapusBookingBerhasil').html();
                        if(NotifikasiHapusBookingBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Booking/TabelBooking.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelBooking').html(data);
                                    $('#ModalDeleteBooking').modal('hide');
                                    swal("Good Job!", "Hapus Booking Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Jadwal
$('#ModalEditBooking').on('show.bs.modal', function (e) {
    var id_kunjungan = $(e.relatedTarget).data('id');
    $('#FormEditBooking').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormEditBooking.php',
        data        : {id_kunjungan: id_kunjungan},
        success     : function(data){
            $('#FormEditBooking').html(data);
            
        }
    });
});
//Proses Edit Jadwal
$('#ProsesEditBooking').submit(function(){
    $('#NotifikasiEditBooking').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditBooking')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/ProsesEditBooking.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditBooking').html(data);
            var NotifikasiEditBookingBerhasil=$('#NotifikasiEditBookingBerhasil').html();
            if(NotifikasiEditBookingBerhasil=="Success"){
                window.location.href = "index.php?Page=Booking";
            }
        }
    });
});
//Hapus jadwal
$('#ModalHapusJadwal').on('show.bs.modal', function (e) {
    var id_kunjungan_jadwal = $(e.relatedTarget).data('id');
    $('#FormDeleteJadwal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormDeleteJadwal.php',
        data        : {id_kunjungan_jadwal: id_kunjungan_jadwal},
        success     : function(data){
            $('#FormDeleteJadwal').html(data);
            //Konfirmasi Hapus data
            $('#KonfirmasiHapusJadwal').click(function(){
                $('#NotifikasiHapusJadwal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesHapusJadwal.php',
                    data        : {id_kunjungan_jadwal: id_kunjungan_jadwal},
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