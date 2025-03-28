//Ubah Foto 
$('#ProsesUbahFoto').submit(function(){
    $('#NotifikasiUbahFoto').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahFoto')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesUbahFoto.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahFoto').html(data);
            var NotifikasiUbahFotoBerhasil=$('#NotifikasiUbahFotoBerhasil').html();
            if(NotifikasiUbahFotoBerhasil=="Success"){
                window.location.href = "index.php?Page=Profile";
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
//Proses Ubah Password
$('#ProsesUbahPassword').submit(function(){
    $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahPassword')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesUbahPassword.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahPassword').html(data);
            var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
            if(NotifikasiUbahPasswordBerhasil=="Success"){
                window.location.href = "index.php?Page=Profile";
            }
        }
    });
});
//Proses Ubah Profile
$('#ProsesUbahProfile').submit(function(){
    $('#NotifikasiUbahProfile').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahProfile')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesUbahProfile.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahProfile').html(data);
            var NotifikasiUbahProfileBerhasil=$('#NotifikasiUbahProfileBerhasil').html();
            if(NotifikasiUbahProfileBerhasil=="Success"){
                window.location.href = "index.php?Page=Profile";
            }
        }
    });
});