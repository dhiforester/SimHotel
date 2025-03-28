$('#ModalTambahTestimoniDanReting').on('show.bs.modal', function (e) {    
    var id_transaksi=$(e.relatedTarget).data('id');
    $('#FormTestimoniReting').html('<div class="row"><div class="col-md-12 text-center">Loading...</div></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/TransaksiReting/FormTestimoniReting.php',
        data 	    :  {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormTestimoniReting').html(data);
            //Ketika memilih akun bank
            $('#ProsesKirimTestimoniReting').submit(function(){
                var ProsesKirimTestimoniReting = $('#ProsesKirimTestimoniReting').serialize();
                $('#NotifikasiKirimTestimoniReting').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/TransaksiReting/ProsesKirimTestimoniReting.php',
                    data 	    :  ProsesKirimTestimoniReting,
                    success     : function(data){
                        $('#NotifikasiKirimTestimoniReting').html(data);
                        var NotifikasiKirimTestimoniRetingBerhasil=$('#NotifikasiKirimTestimoniRetingBerhasil').html();
                        if(NotifikasiKirimTestimoniRetingBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});