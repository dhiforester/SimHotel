<?php
    //Menangkap GET
    if(empty($_GET['email'])){
        $email="";
    }else{
        $email=$_GET['email'];
    }
    if(empty($_GET['token'])){
        $token="";
    }else{
        $token=$_GET['token'];
    }
?>
<!-- Contact Start -->
<div class="container-fluid">
    <!-- <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Login</span></h2> -->
    <div class="row px-xl-5 mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="contact-form bg-light p-30">
                <form action="javascript:void(0)" id="ProsesResetPassword">
                    <input type="hidden" name="email" value="<?php echo "$email"; ?>">
                    <input type="hidden" name="token" value="<?php echo "$token"; ?>">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h3>
                                <i class="bi bi-key"></i>
                                Reset Password
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password Baru">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="TampilkanPassword" name="TampilkanPassword" value="Tampilkan">
                        <label class="custom-control-label text-dark" for="TampilkanPassword">Tampilkan Password</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <p class="help-block">
                                Silahkan masukan password baru anda.
                            </p>
                            <p class="help-block" id="NotifikasiResetPassword">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <button class="btn btn-dark  btn-block py-2 px-4" type="submit">
                                <i class="fas fa-save"></i> Simpan
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