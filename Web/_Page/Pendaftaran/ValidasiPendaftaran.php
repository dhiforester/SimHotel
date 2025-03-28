<!-- Contact Start -->
<?php
    if(empty($_GET['email'])){
        $email="";
    }else{
        $email=$_GET['email'];
    }
?>
<div class="container-fluid">
    <div class="row px-xl-5 mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="contact-form bg-light p-30">
                <form action="javascript:void(0)" id="ProsesValidasiPendaftaran">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h3>
                                <i class="bi bi-pencil"></i>
                                Verifikasi Pendaftaran
                            </h3>
                            <small>
                                Kami telah mengirimkan kode verifikasi ke alamt email anda.
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo "$email"; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <input type="text" class="form-control" id="token" name="token" placeholder="Kode Verifikasi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <p class="help-block" id="NotifikasiValidasiPendaftaran">
                                Pastikan informasi pendaftaran anda sudah benar.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <button class="btn btn-dark  btn-block py-2 px-4" type="submit">
                                Verifikasi Email
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<!-- Contact End -->
<script>
    
</script>