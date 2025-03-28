$('#ListHairstylist').html("Loading...");
$('#ListHairstylist').load("_Page/Hairstylist/ListHairstylist.php");
$('#ProsesCari').submit(function(){
    var ProsesCari = $('#ProsesCari').serialize();
    $('#ListHairstylist').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Hairstylist/ListHairstylist.php',
        data 	    :  ProsesCari,
        success     : function(data){
            $('#ListHairstylist').html(data);
        }
    });
});