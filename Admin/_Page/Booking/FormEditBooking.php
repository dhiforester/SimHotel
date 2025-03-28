<?php
    if(!empty($_POST['id_kunjungan'])){
        $id_kunjungan=$_POST['id_kunjungan'];
?>
<div class="modal-body">
    <div class="row">
            <div class="col col-md-12 text-center">
                Anda akan diarahkan ke halaman form edit booking.
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-success">
    <a href="index.php?Page=Booking&Sub=EditBooking&id=<?php echo "$id_kunjungan"; ?>" class="btn btn-primary btn-rounded">
        Lanjutkan <i class="bi bi-arrow-right-circle"></i>
    </a>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php 
    }else{
        $id_kunjungan="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Sorry, No access data selected.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>