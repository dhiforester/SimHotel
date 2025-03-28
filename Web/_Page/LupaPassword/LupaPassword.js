$('#KirimKodeVerifikasi').click(function(){
    var email = $('#email').val();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiLupaPassword').html(Loading);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/LupaPassword/ProsesKirimKodeVerifikasi.php',
        data 	    :  {email: email},
        success     : function(data){
            $('#NotifikasiLupaPassword').html(data);
            var NotifikasiLupaPasswordBerhasil=$('#NotifikasiLupaPasswordBerhasil').html();
            if(NotifikasiLupaPasswordBerhasil=="Success"){
                swal("Success!", "Kirim Kode Verifikasi Berhasil", "success");
            }
        }
    });
});
$('#ProsesValidasiLupaPassword').submit(function(){
    var ProsesValidasiLupaPassword = $('#ProsesValidasiLupaPassword').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiLupaPassword').html(Loading);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/LupaPassword/ValidasiLupaPassword.php',
        data 	    :  ProsesValidasiLupaPassword,
        success     : function(data){
            $('#NotifikasiLupaPassword').html(data);
            var NotifikasiValidasiLupaPasswordBerhasil=$('#NotifikasiValidasiLupaPasswordBerhasil').html();
            var UrlBack=$('#UrlBack').html();
            //Menghilangkan amp;
            var Back=UrlBack.replace(/&amp;/g, '&');
            if(NotifikasiValidasiLupaPasswordBerhasil=="Success"){
                window.location.href = Back;
            }
        }
    });
});
$('#ProsesResetPassword').submit(function(){
    var ProsesResetPassword = $('#ProsesResetPassword').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div> Loading..';
    $('#NotifikasiResetPassword').html(Loading);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/LupaPassword/ProsesResetPassword.php',
        data 	    :  ProsesResetPassword,
        success     : function(data){
            $('#NotifikasiResetPassword').html(data);
            var NotifikasiResetPasswordBerhasil=$('#NotifikasiResetPasswordBerhasil').html();
            if(NotifikasiResetPasswordBerhasil=="Success"){
                window.location.href = "index.php?Page=Login";
            }
        }
    });
});
//Kondisi saat tampilkan password
$('#TampilkanPassword').click(function(){
    if($(this).is(':checked')){
        $('#password1').attr('type','text');
        $('#password2').attr('type','text');
    }else{
        $('#password1').attr('type','password');
        $('#password2').attr('type','password');
    }
});