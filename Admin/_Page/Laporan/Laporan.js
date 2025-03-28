$('#ProsesRekapitulasiTransaksi').submit(function(){
    var ProsesRekapitulasiTransaksi = $('#ProsesRekapitulasiTransaksi').serialize();
    $('#MenampilkanRekapitulasiTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Laporan/TabelLaporan.php',
        data 	    :  ProsesRekapitulasiTransaksi,
        success     : function(data){
            $('#MenampilkanRekapitulasiTransaksi').html(data);
        }
    });
});