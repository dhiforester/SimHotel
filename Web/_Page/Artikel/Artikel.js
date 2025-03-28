var ProsesBatas = $('#ProsesBatas').serialize();
$('#TabelArtikel').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Artikel/TabelArtikel.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#TabelArtikel').html(data);
    }
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#TabelArtikel').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Artikel/TabelArtikel.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#TabelArtikel').html(data);
        }
    });
});