//Kondisi saat tampilkan password
$('#TampilkanPassword2').click(function(){
    if($(this).is(':checked')){
        $('#password1').attr('type','text');
    }else{
        $('#password1').attr('type','password');
    }
    if($(this).is(':checked')){
        $('#password2').attr('type','text');
    }else{
        $('#password2').attr('type','password');
    }
});
$('#ProsesPendaftaran').submit(function(){
    var ProsesPendaftaran = $('#ProsesPendaftaran').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiPendaftaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/ProsesPendaftaran.php',
        data 	    :  ProsesPendaftaran,
        success     : function(data){
            $('#NotifikasiPendaftaran').html(data);
            var NotifikasiPendaftaranBerhasil=$('#NotifikasiPendaftaranBerhasil').html();
            if(NotifikasiPendaftaranBerhasil=="Success"){
                window.location.href = "index.php?Page=Login";
            }
        }
    });
});