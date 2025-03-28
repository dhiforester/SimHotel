$('#MenampilkanTabelChatingAdmin').html("Loading...");
$('#MenampilkanTabelChatingAdmin').load("_Page/Chating/TabelChatingAdmin.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelChatingAdmin').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/TabelChatingAdmin.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelChatingAdmin').html(data);
        }
    });
});
$('#ProsesBatasAdmin').submit(function(){
    var ProsesBatas = $('#ProsesBatasAdmin').serialize();
    $('#MenampilkanTabelChatingAdmin').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/TabelChatingAdmin.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelChatingAdmin').html(data);
        }
    });
});
//Detail Chat Admin
$('#ModalDetailChatAdmin').on('show.bs.modal', function (e) {
    var id_pelanggan = $(e.relatedTarget).data('id');
    $('#IsiChatAdmin').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/IsiChatAdmin.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#IsiChatAdmin').html(data);
        }
    });
    //Proses Kirim Pesan
    $('#ProsesBalasChatAdmin').submit(function(){
        $('#TombolKirim').html('Sending..');
        var IsiPesan =$('#pesan').val();
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Chating/ProsesBalasChatAdmin.php',
            data 	    :  {pesan: IsiPesan, id_pelanggan: id_pelanggan},
            success     : function(data){
                $('#TombolKirim').html(data);
                $('#TombolKirim').html('<i class="bi bi-send-check-fill"></i> Kirim');
                $('#pesan').val('');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Chating/IsiChatAdmin.php',
                    data        : {id_pelanggan: id_pelanggan},
                    success     : function(data){
                        $('#IsiChatAdmin').html(data);
                    }
                });
            }
        });
    });
});

//Mitra
$('#MenampilkanTabelChatingMitra').html("Loading...");
$('#MenampilkanTabelChatingMitra').load("_Page/Chating/TabelChatingMitra.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelChatingMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/TabelChatingMitra.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelChatingMitra').html(data);
        }
    });
});
$('#ProsesBatasMitra').submit(function(){
    var ProsesBatas = $('#ProsesBatasMitra').serialize();
    $('#MenampilkanTabelChatingMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/TabelChatingMitra.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelChatingMitra').html(data);
        }
    });
});
//Detail Chat Mitra
$('#ModalDetailChatMitra').on('show.bs.modal', function (e) {
    var id_pelanggan = $(e.relatedTarget).data('id');
    $('#IsiChatMitra').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/IsiChatMitra.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#IsiChatMitra').html(data);
        }
    });
    //Proses Kirim Pesan
    $('#ProsesBalasChatMitra').submit(function(){
        $('#TombolKirimMitra').html('Sending..');
        var IsiPesan =$('#pesanmitra').val();
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Chating/ProsesBalasChatMitra.php',
            data 	    :  {pesan: IsiPesan, id_pelanggan: id_pelanggan},
            success     : function(data){
                $('#TombolKirimMitra').html(data);
                $('#TombolKirimMitra').html('<i class="bi bi-send-check-fill"></i> Kirim');
                $('#pesanmitra').val('');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Chating/IsiChatMitra.php',
                    data        : {id_pelanggan: id_pelanggan},
                    success     : function(data){
                        $('#IsiChatMitra').html(data);
                    }
                });
            }
        });
    });
});