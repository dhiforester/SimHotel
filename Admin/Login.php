<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            session_start();
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            $Page="Login";
            include "_Partial/JsPlugin.php";
        ?>
    </head>
    <body>
        <main class="bg bg-dark">
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <img src="assets/img/<?php echo $logo;?>" alt="<?php echo $title_page;?>" width="100px">
                                <div class="d-flex justify-content-center py-2">
                                    <p>
                                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                                            <span class="d-none d-lg-block text-light"><?php echo $title_page;?></span>
                                        </a>
                                    </p>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Login Ke Akun Anda</h5>
                                            <p class="text-center small">Masukan Email Dan Password Untuk Melakukan Login</p>
                                        </div>
                                        <form action="javascript:void(0);" class="row g-3" id="ProsesLogin">
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email" class="form-control" id="email" required>
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                                <small class="credit">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword2" name="TampilkanPassword2">
                                                        <label class="form-check-label" for="TampilkanPassword2">
                                                            Tampilkan Password
                                                        </label>
                                                    </div>
                                                </small>
                                            </div>
                                            <div class="col-12" id="NotifikasiLogin">
                                                Pastikan email dan password sudah benar.
                                            </div>
                                            <div class="col-12 mb-5">
                                                <button class="btn btn-md btn-primary w-100" type="submit" id="TombolLogin">
                                                    <i class="bi bi-lock"></i> Login
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="credits text-center">
                                    <small>
                                        <span class="text-light">Dibuat Oleh :</span> <span class="text-warning"><b><?php echo $author;?></b></span>
                                    </small><br>
                                    <?php echo $organization;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </main>
        <?php
            include "_Partial/BackToTop.php";
            include "_Partial/FooterJs.php";
            include "_Partial/RoutingJs.php";
            include "_Partial/RoutingSwal.php";
        ?>
        <script>
            //Kondisi saat tampilkan password
            $('#TampilkanPassword2').click(function(){
                if($(this).is(':checked')){
                    $('#password').attr('type','text');
                }else{
                    $('#password').attr('type','password');
                }
            });
        </script>
    </body>

</html>