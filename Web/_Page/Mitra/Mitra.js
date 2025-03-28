$('#ListDataMitra').html("Loading...");
$('#ListDataMitra').load("_Page/Mitra/ListDataMitra.php");
$('#ProsesCari').submit(function(){
    var ProsesCari = $('#ProsesCari').serialize();
    $('#ListDataMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Mitra/ListDataMitra.php',
        data 	    :  ProsesCari,
        success     : function(data){
            $('#ListDataMitra').html(data);
        }
    });
});