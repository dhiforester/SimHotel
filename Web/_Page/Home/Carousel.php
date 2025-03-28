<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-3">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1" class=""></li>
                    <li data-target="#header-carousel" data-slide-to="2" class=""></li>
                    <li data-target="#header-carousel" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/Slider/slider1.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Fasilitas Kamar Luas</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Kami menyediakan kamar dengan ukuran yang luas</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/Slider/slider2.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kolam Renang</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Tersedia kolam renang untuk bermain anak-anak</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/Slider/slider3.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kolam Renang</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Tersedia kolam renang untuk bermain anak-anak</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="img/Slider/slider5.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kebersihan Lingkungan</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Kami Selalu Menjaga Kebersihan lingkungan hotel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(empty($SessionIdPelanggan)){ ?>
            <div class="col-lg-12 mb-3">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/pendaftaran.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Layanan</h6>
                        <h3 class="text-white mb-3">Pendaftaran Pelanggan</h3>
                        <a href="index.php?Page=Pendaftaran" class="btn btn-primary">Daftar sekarang</a>
                    </div>
                </div>
                <!-- <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/kamar.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Kamar</h6>
                        <h3 class="text-white mb-3">Lihat Semua Kamar</h3>
                        <a href="index.php?Page=Kamar" class="btn btn-primary">Lihat Semua</a>
                    </div>
                </div> -->
            </div>
        <?php } ?>
    </div>
</div>
<!-- Carousel End -->