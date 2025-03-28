<?php
    if(empty($_GET['Kategori'])){
        $kategori="";
    }else{
        $kategori=$_GET['Kategori'];
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Bantuan</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bantuan</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-3">
            <div class="bg-light p-30 mb-30">
                <h5>1.  Cara Melakukan Pendaftaran</h5>
                <p>
                    Berikut ini langkah-langkah yang harus anda lakukan untuk memulai melakukan pendaftaran:
                    <ul>
                        <li>
                            Masuk ke halaman pendaftaran yang tersedia pada menu utama website.
                        </li>
                        <li>
                            Isi  formulir pendaftaran akun seperti nama, email, NIK/Passport, kontak dan password.
                        </li>
                        <li>
                            Klik pada tombol daftar, tunggu hingga proses  selesai.
                        </li>
                        <li>
                            Masuk/login menggunakan akun yang sudah anda buat tadi.
                        </li>
                        <li>
                            Masuk ke halaman edit dan anda bisa mengisi identitas lebih lengkap untuk mempermudah pada saat proses booking.
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-3">
            <div class="bg-light p-30 mb-30">
                <h5>2.  Cara Melakukan Booking</h5>
                <p>
                    Berikut ini langkah-langkah yang harus anda lakukan untuk melakukan booking:
                    <ul>
                        <li>
                            Masuk/login ke akun anda.
                        </li>
                        <li>
                            Masuk ke menu kamar atau anda bisa memilih kategori kamar.
                        </li>
                        <li>
                            Silahkan cek ketersediaan kamar, pastikan kamar tersedia.
                        </li>
                        <li>
                            Jangan lupa juga selalu cek harga dan ketentuan reservasi.
                        </li>
                        <li>
                            Lanjutkan langkah berikutnya dengan memilih metode/akun bank untuk pembayaran.
                        </li>
                        <li>
                            Simpan data reservasi dan lakukan pembayaran sesuai petunjuk.
                        </li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->