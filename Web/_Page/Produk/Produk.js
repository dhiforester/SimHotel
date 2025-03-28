$('#MenampilkanTabelBarang').html("Loading...");
var GetKategori = $('#GetKategori').val();
$('#TabelProduk').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Produk/TabelProduk.php',
    data 	    :  {Kategori: GetKategori},
    success     : function(data){
        $('#TabelProduk').html(data);
    }
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#TabelProduk').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Produk/TabelProduk.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#TabelProduk').html(data);
        }
    });
});
$('#ModalBooking').on('show.bs.modal', function (e) {    
    var FormBooking = $('#FormBooking').serialize();
    $('#FormBookingSekarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Produk/FormBookingSekarang.php',
        data 	    :  FormBooking,
        success     : function(data){
            $('#FormBookingSekarang').html(data);
        }
    });
    $('#ProsesSimpanBooking').submit(function(){
        $('#NotifikasiBooking').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Booking/ProsesBooking.php',
            data 	    :  FormBooking,
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
});
