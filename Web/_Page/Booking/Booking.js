//Kondisi saat tampilkan password
$('#TampilkanPassword').click(function(){
    if($(this).is(':checked')){
        $('#password').attr('type','text');
    }else{
        $('#password').attr('type','password');
    }
});
$('#ProsesLoginBooking').submit(function(){
    var ProsesLogin = $('#ProsesLoginBooking').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiLogin').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Login/ProsesLogin.php',
        data 	    :  ProsesLogin,
        success     : function(data){
            $('#NotifikasiLogin').html(data);
            var NotifikasiProsesLoginBerhasil=$('#NotifikasiProsesLoginBerhasil').html();
            if(NotifikasiProsesLoginBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
$('#ModalPilihMitra').on('show.bs.modal', function (e) {    
    $('#FormPilihMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormPilihMitra.php',
        success     : function(data){
            $('#FormPilihMitra').html(data);
            $('#ProsesPilihMitra').submit(function(){
                var ProsesPilihMitra = $('#ProsesPilihMitra').serialize();
                $('#NotifikasiPilihMitra').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesPilihMitra.php',
                    data 	    :  ProsesPilihMitra,
                    success     : function(data){
                        $('#NotifikasiPilihMitra').html(data);
                        var NotifikasiPilihMitraBerhasil=$('#NotifikasiPilihMitraBerhasil').html();
                        var OptionMitra=$('#OptionMitra').html();
                        if(NotifikasiPilihMitraBerhasil=="Success"){
                            $('#NotifikasiPilihMitra').html("Pastikan anda sudah memilih mitra yang sesuai");
                            $('#ModalPilihMitra').modal('hide');
                            $('#id_mitra').html(OptionMitra);
                            $('#id_mitra_layanan').html('<option value="">Pilih</option>');
                            $('#id_hairstylist').html('<option value="">Pilih</option>');
                            $('#jam').html('<option value="">Pilih</option>');
                        }
                    }
                });
            });
        }
    });
});
$('#ModalPilihLayanan').on('show.bs.modal', function (e) {    
    var id_mitra =$('#id_mitra').val();
    $('#FormPilihLayanan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormPilihLayanan.php',
        data 	    :  {id_mitra: id_mitra},
        success     : function(data){
            $('#FormPilihLayanan').html(data);
            $('#ProsesPilihLayanan').submit(function(){
                var ProsesPilihLayanan = $('#ProsesPilihLayanan').serialize();
                $('#NotifikasiPilihLayanan').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesPilihLayanan.php',
                    data 	    :  ProsesPilihLayanan,
                    success     : function(data){
                        $('#NotifikasiPilihLayanan').html(data);
                        var NotifikasiPilihLayananBerhasil=$('#NotifikasiPilihLayananBerhasil').html();
                        var OptionLayanan=$('#OptionLayanan').html();
                        if(NotifikasiPilihLayananBerhasil=="Success"){
                            $('#NotifikasiPilihLayanan').html("Pastikan anda sudah memilih layanan yang sesuai");
                            $('#ModalPilihLayanan').modal('hide');
                            $('#id_mitra_layanan').html(OptionLayanan);
                        }
                    }
                });
            });
        }
    });
});
$('#ModalPilihJamLayanan').on('show.bs.modal', function (e) {    
    var id_hairstylist =$('#id_hairstylist').val();
    var id_mitra =$('#id_mitra').val();
    var tanggal =$('#tanggal').val();
    $('#FormJamLayanan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormJamLayanan.php',
        data 	    :  {id_mitra: id_mitra, id_hairstylist: id_hairstylist, tanggal: tanggal},
        success     : function(data){
            $('#FormJamLayanan').html(data);
            $('#ProsesPilihJamLayanan').submit(function(){
                var ProsesPilihJamLayanan = $('#ProsesPilihJamLayanan').serialize();
                $('#NotifikasiPilihJamLayanan').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesPilihJamLayanan.php',
                    data 	    :  ProsesPilihJamLayanan,
                    success     : function(data){
                        $('#NotifikasiPilihJamLayanan').html(data);
                        var NotifikasiPilihJamLayananBerhasil=$('#NotifikasiPilihJamLayananBerhasil').html();
                        var OptionJamLayanan=$('#OptionJamLayanan').html();
                        if(NotifikasiPilihJamLayananBerhasil=="Success"){
                            $('#NotifikasiPilihJamLayanan').html("Pastikan anda sudah memilih jadwal dengan benar");
                            $('#ModalPilihJamLayanan').modal('hide');
                            $('#jam').html(OptionJamLayanan);
                        }
                    }
                });
            });
        }
    });
});
$('#ModalPilihHairstylist').on('show.bs.modal', function (e) {    
    var id_mitra =$('#id_mitra').val();
    $('#FormPilihHairstylist').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormPilihHairstylist.php',
        data 	    :  {id_mitra: id_mitra},
        success     : function(data){
            $('#FormPilihHairstylist').html(data);
            $('#ProsesPilihHairstylist').submit(function(){
                var ProsesPilihHairstylist = $('#ProsesPilihHairstylist').serialize();
                $('#NotifikasiPilihHairstylist').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesPilihHairstylist.php',
                    data 	    :  ProsesPilihHairstylist,
                    success     : function(data){
                        $('#NotifikasiPilihHairstylist').html(data);
                        var NotifikasiPilihHairstylistBerhasil=$('#NotifikasiPilihHairstylistBerhasil').html();
                        var OptionHairstylist=$('#OptionHairstylist').html();
                        if(NotifikasiPilihHairstylistBerhasil=="Success"){
                            $('#NotifikasiPilihHairstylist').html("Pastikan anda sudah memilih hairstylist dengan benar");
                            $('#ModalPilihHairstylist').modal('hide');
                            $('#id_hairstylist').html(OptionHairstylist);
                            $('#jam').html('<option value="">Pilih</option>');
                        }
                    }
                });
            });
        }
    });
});
$('#ProsesBooking').submit(function(){
    var ProsesBooking = $('#ProsesBooking').serialize();
    $('#NotifikasiBooking').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/ProsesBooking.php',
        data 	    :  ProsesBooking,
        success     : function(data){
            $('#NotifikasiBooking').html(data);
            var UrlBack=$('#UrlBack').html();
            var UrlBack= UrlBack.replace('amp;', "");
            var UrlBack= UrlBack.replace('amp;', "");
            var NotifikasiBookingBerhasil=$('#NotifikasiBookingBerhasil').html();
            if(NotifikasiBookingBerhasil=="Success"){
                window.location.href=UrlBack;
            }
        }
    });
});
$('#ProsesBooking').submit(function(){
    var ProsesBooking = $('#ProsesBooking').serialize();
    $('#NotifikasiBooking').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/ProsesBooking.php',
        data 	    :  ProsesBooking,
        success     : function(data){
            $('#NotifikasiBooking').html(data);
            var UrlBack=$('#UrlBack').html();
            var UrlBack= UrlBack.replace('amp;', "");
            var UrlBack= UrlBack.replace('amp;', "");
            var NotifikasiBookingBerhasil=$('#NotifikasiBookingBerhasil').html();
            if(NotifikasiBookingBerhasil=="Success"){
                window.location.href=UrlBack;
            }
        }
    });
});
$('#ModalPilihHairstylist').on('show.bs.modal', function (e) {    
    var id_mitra =$('#id_mitra').val();
    $('#FormPilihHairstylist').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormPilihHairstylist.php',
        data 	    :  {id_mitra: id_mitra},
        success     : function(data){
            $('#FormPilihHairstylist').html(data);
            $('#ProsesPilihHairstylist').submit(function(){
                var ProsesPilihHairstylist = $('#ProsesPilihHairstylist').serialize();
                $('#NotifikasiPilihHairstylist').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/ProsesPilihHairstylist.php',
                    data 	    :  ProsesPilihHairstylist,
                    success     : function(data){
                        $('#NotifikasiPilihHairstylist').html(data);
                        var NotifikasiPilihHairstylistBerhasil=$('#NotifikasiPilihHairstylistBerhasil').html();
                        var OptionHairstylist=$('#OptionHairstylist').html();
                        if(NotifikasiPilihHairstylistBerhasil=="Success"){
                            $('#NotifikasiPilihHairstylist').html("Pastikan anda sudah memilih hairstylist dengan benar");
                            $('#ModalPilihHairstylist').modal('hide');
                            $('#id_hairstylist').html(OptionHairstylist);
                            $('#jam').html('<option value="">Pilih</option>');
                        }
                    }
                });
            });
        }
    });
});
$('#ModalPembayaranManual').on('show.bs.modal', function (e) {    
    var id_transaksi=$(e.relatedTarget).data('id');
    $('#FormPembayaranManual').html('<div class="row"><div class="col-md-12 text-center">Loading...</div></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Booking/FormPembayaranManual.php',
        data 	    :  {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormPembayaranManual').html(data);
            //Ketika memilih akun bank
            $('#metode').change(function(){
                var nama_bank = $('#metode').val();
                $('#PreviewPembayaran').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Booking/PreviewPembayaran.php',
                    data 	    :  {nama_bank: nama_bank, id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#PreviewPembayaran').html(data);
                        $('#ProsesPembayaranManual').submit(function(){
                            var ProsesPembayaranManual = $('#ProsesPembayaranManual').serialize();
                            $('#NotifikasiPembayaranManual').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Booking/ProsesPembayaranManual.php',
                                data 	    :  ProsesPembayaranManual,
                                success     : function(data){
                                    $('#NotifikasiPembayaranManual').html(data);
                                    var NotifikasiPembayaranManualBerhasil=$('#NotifikasiPembayaranManualBerhasil').html();
                                    if(NotifikasiPembayaranManualBerhasil=="Success"){
                                        location.reload();
                                    }
                                }
                            });
                        });
                    }
                });
            });
        }
    });
});