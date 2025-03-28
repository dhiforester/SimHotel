<?php
    echo '<div class="pagetitle">';
    //Routing Page Title
    if(empty($_GET['Page'])){
        echo '<h1><i class="bi bi-grid"></i> Dashboard</h1>';
        echo '<nav>';
        echo '  <ol class="breadcrumb">';
        echo '      <li class="breadcrumb-item active">Dashboard</li>';
        echo '  </ol>';
        echo '</nav>';
    }else{
        if($_GET['Page']=="Akses"){
            echo '<h1><i class="bi bi-people"></i> Manajmen Akses</h1>';
            echo '<nav>';
            echo '  <ol class="breadcrumb">';
            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
            echo '      <li class="breadcrumb-item active">Akses</li>';
            echo '  </ol>';
            echo '</nav>';
        }else{
            if($_GET['Page']=="Kamar"){
                echo '<h1><i class="bi bi-building"></i> Kelola Kamar</h1>';
                echo '<nav>';
                echo '  <ol class="breadcrumb">';
                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                echo '      <li class="breadcrumb-item active">Kamar</li>';
                echo '  </ol>';
                echo '</nav>';
            }else{
                if($_GET['Page']=="Diskon"){
                    echo '<h1><i class="bi bi-gift"></i> Diskon</h1>';
                    echo '<nav>';
                    echo '  <ol class="breadcrumb">';
                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                    echo '      <li class="breadcrumb-item active">Diskon</li>';
                    echo '  </ol>';
                    echo '</nav>';
                }else{
                    if($_GET['Page']=="SettingWhatsapp"){
                        echo '<h1><i class="bi bi-whatsapp"></i> Pengaturan Whatsapp</h1>';
                        echo '<nav>';
                        echo '  <ol class="breadcrumb">';
                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                        echo '      <li class="breadcrumb-item active">Pengaturan Whatsapp</li>';
                        echo '  </ol>';
                        echo '</nav>';
                    }else{
                        if($_GET['Page']=="SettingPayment"){
                            echo '<h1><i class="bi bi-credit-card-2-back"></i> Pengaturan Payment</h1>';
                            echo '<nav>';
                            echo '  <ol class="breadcrumb">';
                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                            echo '      <li class="breadcrumb-item active">Pengaturan Payment</li>';
                            echo '  </ol>';
                            echo '</nav>';
                        }else{
                            if($_GET['Page']=="SettingEmail"){
                                echo '<h1><i class="bi bi-envelope"></i> Pengaturan Email</h1>';
                                echo '<nav>';
                                echo '  <ol class="breadcrumb">';
                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                echo '      <li class="breadcrumb-item active">Pengaturan Email</li>';
                                echo '  </ol>';
                                echo '</nav>';
                            }else{
                                if($_GET['Page']=="Laporan"){
                                    echo '<h1><i class="bi bi-file-code"></i> Laporan</h1>';
                                    echo '<nav>';
                                    echo '  <ol class="breadcrumb">';
                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                    echo '      <li class="breadcrumb-item active">Laporan API</li>';
                                    echo '  </ol>';
                                    echo '</nav>';
                                }else{
                                    if($_GET['Page']=="Testimoni"){
                                        echo '<h1><i class="bi bi-chat-dots"></i> Testimoni</h1>';
                                        echo '<nav>';
                                        echo '  <ol class="breadcrumb">';
                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                        echo '      <li class="breadcrumb-item active">Testimoni</li>';
                                        echo '  </ol>';
                                        echo '</nav>';
                                    }else{
                                        if($_GET['Page']=="Partnership"){
                                            if(empty($_GET['Sub'])){
                                                echo '<h1><i class="bi bi-building"></i> Mitra</h1>';
                                                echo '<nav>';
                                                echo '  <ol class="breadcrumb">';
                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                echo '      <li class="breadcrumb-item active">Mitra</li>';
                                                echo '  </ol>';
                                                echo '</nav>';
                                            }else{
                                                $Sub=$_GET['Sub'];
                                                if($Sub=="DetailPartner"){
                                                    echo '<h1><i class="bi bi-building"></i> Detail Mitra</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Partnership">Mitra</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Detail Mitra</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }else{
                                                    echo '<h1><i class="bi bi-building"></i> Mitra</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Mitra</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }
                                            }
                                           
                                        }else{
                                            if($_GET['Page']=="EntitasAkses"){
                                                if(empty($_GET['Sub'])){
                                                    echo '<h1><i class="bi bi-key"></i> Entitas Ases</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Entitas Akses</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }else{
                                                    if($_GET['Sub']=="BuatEntitas"){
                                                        echo '<h1><i class="bi bi-key"></i> Entitas Ases</h1>';
                                                        echo '<nav>';
                                                        echo '  <ol class="breadcrumb">';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=EntitasAkses">Entitas Akses</a></li>';
                                                        echo '      <li class="breadcrumb-item active">Buat Entitas</li>';
                                                        echo '  </ol>';
                                                        echo '</nav>';
                                                    }
                                                }
                                            }else{
                                                if($_GET['Page']=="MyProfile"){
                                                    echo '<h1><i class="bi bi-person-circle"></i> Profile Saya</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Profile Saya</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }else{
                                                    if($_GET['Page']=="Help"){
                                                        echo '<h1><i class="bi bi-person-circle"></i> Bantuan</h1>';
                                                        echo '<nav>';
                                                        echo '  <ol class="breadcrumb">';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                        echo '      <li class="breadcrumb-item active">Bantuan</li>';
                                                        echo '  </ol>';
                                                        echo '</nav>';
                                                    }else{
                                                        if($_GET['Page']=="Layanan"){
                                                            echo '<h1><i class="bi bi-list-check"></i> Layanan</h1>';
                                                            echo '<nav>';
                                                            echo '  <ol class="breadcrumb">';
                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                            echo '      <li class="breadcrumb-item active">Layanan</li>';
                                                            echo '  </ol>';
                                                            echo '</nav>';
                                                        }else{
                                                            if($_GET['Page']=="Hairstylist"){
                                                                echo '<h1><i class="bi bi-scissors"></i> Hairstylist</h1>';
                                                                echo '<nav>';
                                                                echo '  <ol class="breadcrumb">';
                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                echo '      <li class="breadcrumb-item active">Hairstylist</li>';
                                                                echo '  </ol>';
                                                                echo '</nav>';
                                                            }else{
                                                                if($_GET['Page']=="Klaim"){
                                                                    echo '<h1><i class="bi bi-wallet"></i> Klaim</h1>';
                                                                    echo '<nav>';
                                                                    echo '  <ol class="breadcrumb">';
                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                    echo '      <li class="breadcrumb-item active">Klaim</li>';
                                                                    echo '  </ol>';
                                                                    echo '</nav>';
                                                                }else{
                                                                    if($_GET['Page']=="Booking"){
                                                                        if(empty($_GET['Sub'])){
                                                                            echo '<h1><i class="bi bi-journal-text"></i> Booking</h1>';
                                                                            echo '<nav>';
                                                                            echo '  <ol class="breadcrumb">';
                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                            echo '      <li class="breadcrumb-item active">Booking</li>';
                                                                            echo '  </ol>';
                                                                            echo '</nav>';
                                                                        }else{
                                                                            $Sub=$_GET['Sub'];
                                                                            if($Sub=="TambahBooking"){
                                                                                echo '<h1><i class="bi bi-journal-text"></i> Tambah Booking</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=Booking">Booking</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Tambah Booking</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }else{
                                                                                if($Sub=="DetailKunjungan"){
                                                                                    echo '<h1><i class="bi bi-journal-text"></i> Detail Kunjungan</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Booking">Booking</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Detail Booking</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }else{
                                                                                    if($Sub=="EditBooking"){
                                                                                        echo '<h1><i class="bi bi-journal-text"></i> Detail Booking</h1>';
                                                                                        echo '<nav>';
                                                                                        echo '  <ol class="breadcrumb">';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Booking">Booking</a></li>';
                                                                                        echo '      <li class="breadcrumb-item active">Edit Booking</li>';
                                                                                        echo '  </ol>';
                                                                                        echo '</nav>';
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }else{
                                                                        if($_GET['Page']=="KontenWeb"){
                                                                            if($_GET['Sub']=="KontenUmum"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Konten Web</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                            if($_GET['Sub']=="PagePosting"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Posting Web</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                            if($_GET['Sub']=="TambahPagePosting"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=KontenWeb&Sub=PagePosting">Posting</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Tambah Posting Web</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                            if($_GET['Sub']=="EditPagePosting"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=KontenWeb&Sub=PagePosting">Posting</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Edit Posting Web</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                            if($_GET['Sub']=="UrlDinamis"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">URL Dinamis</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                            if($_GET['Sub']=="Testimoni"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Testimoni</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                            if($_GET['Sub']=="FAQ"){
                                                                                echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">FAQ</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }
                                                                        }else{
                                                                            if($_GET['Page']=="Pelanggan"){
                                                                                echo '<h1><i class="bi bi-people"></i> Pelanggan</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Pelanggan</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }else{
                                                                                if($_GET['Page']=="Barang"){
                                                                                    if(empty($_GET['Sub'])){
                                                                                        echo '<h1><i class="bi bi-box-seam"></i> Barang</h1>';
                                                                                        echo '<nav>';
                                                                                        echo '  <ol class="breadcrumb">';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                        echo '      <li class="breadcrumb-item active">Barang</li>';
                                                                                        echo '  </ol>';
                                                                                        echo '</nav>';
                                                                                    }else{
                                                                                        $Sub=$_GET['Sub'];
                                                                                        if($Sub=="Kategori"){
                                                                                            echo '<h1><i class="bi bi-tags"></i> Kategori Barang</h1>';
                                                                                            echo '<nav>';
                                                                                            echo '  <ol class="breadcrumb">';
                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php?Page=Barang">Barang</a></li>';
                                                                                            echo '      <li class="breadcrumb-item active">Kategori Barang</li>';
                                                                                            echo '  </ol>';
                                                                                            echo '</nav>';
                                                                                        }else{
                                                                                            if($Sub=="DetailBarang"){
                                                                                                echo '<h1><i class="bi bi-info-circle"></i> Detail Barang</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=Barang">Barang</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Detail Barang</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }else{
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }else{
                                                                                    if($_GET['Page']=="Transaksi"){
                                                                                        if(empty($_GET['Sub'])){
                                                                                            echo '<h1><i class="bi bi-cart-check"></i> Transaksi</h1>';
                                                                                            echo '<nav>';
                                                                                            echo '  <ol class="breadcrumb">';
                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                            echo '      <li class="breadcrumb-item active">Transaksi</li>';
                                                                                            echo '  </ol>';
                                                                                            echo '</nav>';
                                                                                        }else{
                                                                                            $Sub=$_GET['Sub'];
                                                                                            if($Sub=="TambahTransaksi"){
                                                                                                echo '<h1><i class="bi bi-cart-check"></i> Tambah Transaksi</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=Transaksi">Transaksi</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Tambah Transaksi</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }else{
                                                                                                if($Sub=="DetailTransaksi"){
                                                                                                    echo '<h1><i class="bi bi-cart-check"></i> Detail Transaksi</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Transaksi">Transaksi</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Detail Transaksi</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }else{
                                                                                                    if($Sub=="EditTransaksi"){
                                                                                                        echo '<h1><i class="bi bi-cart-check"></i> Edit Transaksi</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Transaksi">Transaksi</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Edit Transaksi</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }else{
                                                                                        if($_GET['Page']=="Pembayaran"){
                                                                                            if(!empty($_GET['Sub'])){
                                                                                                $Sub=$_GET['Sub'];
                                                                                            }else{
                                                                                                $Sub="";
                                                                                            }
                                                                                            if($Sub=="TambahPembayaran"){
                                                                                                echo '<h1><i class="bi bi-cash-coin"></i> Tambah Pembayaran</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=Pembayaran">Pembayaran</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Tambah Pembayaran</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }else{
                                                                                                echo '<h1><i class="bi bi-cash-coin"></i> Pembayaran</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Pembayaran</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }
                                                                                        }else{
                                                                                            if($_GET['Page']=="Aktivitas"){
                                                                                                if($_GET['Sub']=="AktivitasUmum"||$_GET['Sub']==""){
                                                                                                    echo '<h1><i class="bi bi-record-btn"></i> Aktivitas Umum</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Aktivitas</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }
                                                                                                if($_GET['Sub']=="Email"){
                                                                                                    echo '<h1><i class="bi bi-record-btn"></i> Aktivitas Email</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Aktivitas</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }
                                                                                                if($_GET['Sub']=="APIs"){
                                                                                                    echo '<h1><i class="bi bi-record-btn"></i> Aktivitas APIs</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Aktivitas</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }
                                                                                            }else{
                                                                                                if($_GET['Page']=="AkunPerkiraan"){
                                                                                                    echo '<h1><i class="bi bi-list-nested"></i> Akun Perkiraan</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Akun Perkiraan</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }else{
                                                                                                    if($_GET['Page']=="SettingBank"){
                                                                                                        echo '<h1><i class="bi bi-bank"></i> Setting Bank</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Setting Bank</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }else{
                                                                                                        if($_GET['Page']=="WhatsappGateway"){
                                                                                                            if($_GET['Sub']=="AkunWa"){
                                                                                                                echo '<h1><i class="bi bi-whatsapp"></i> Akun Whatsapp</h1>';
                                                                                                                echo '<nav>';
                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                echo '      <li class="breadcrumb-item active">Akun Whatsapp</li>';
                                                                                                                echo '  </ol>';
                                                                                                                echo '</nav>';
                                                                                                            }else{
                                                                                                                echo '<h1><i class="bi bi-whatsapp"></i> Whatsapp Gateway</h1>';
                                                                                                                echo '<nav>';
                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                echo '      <li class="breadcrumb-item active">Whatsapp Gateway</li>';
                                                                                                                echo '  </ol>';
                                                                                                                echo '</nav>';
                                                                                                            }
                                                                                                        }else{
                                                                                                            if($_GET['Page']=="Jurnal"){
                                                                                                                echo '<h1><i class="bi bi-file-ruled"></i> Jurnal</h1>';
                                                                                                                echo '<nav>';
                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                echo '      <li class="breadcrumb-item active">Jurnal</li>';
                                                                                                                echo '  </ol>';
                                                                                                                echo '</nav>';
                                                                                                            }else{
                                                                                                                if($_GET['Page']=="BukuBesar"){
                                                                                                                    echo '<h1><i class="bi bi-file-ruled"></i> Buku Besar</h1>';
                                                                                                                    echo '<nav>';
                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item active">Buku Besar</li>';
                                                                                                                    echo '  </ol>';
                                                                                                                    echo '</nav>';
                                                                                                                }else{
                                                                                                                    if($_GET['Page']=="NeracaSaldo"){
                                                                                                                        echo '<h1><i class="bi bi-list"></i> Neraca Saldo</h1>';
                                                                                                                        echo '<nav>';
                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                        echo '      <li class="breadcrumb-item active">Neraca Saldo</li>';
                                                                                                                        echo '  </ol>';
                                                                                                                        echo '</nav>';
                                                                                                                    }else{
                                                                                                                        if($_GET['Page']=="LabaRugi"){
                                                                                                                            echo '<h1><i class="bi bi-bxs-coin"></i> Laba-Rugi</h1>';
                                                                                                                            echo '<nav>';
                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                            echo '      <li class="breadcrumb-item active">Laba Rugi</li>';
                                                                                                                            echo '  </ol>';
                                                                                                                            echo '</nav>';
                                                                                                                        }else{
                                                                                                                            if($_GET['Page']=="RekapitulasiTransaksi"){
                                                                                                                                echo '<h1><i class="bi bi-coin"></i> Rekapitulasi Transaksi</h1>';
                                                                                                                                echo '<nav>';
                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                echo '      <li class="breadcrumb-item active">Rekapitulasi Transaksi</li>';
                                                                                                                                echo '  </ol>';
                                                                                                                                echo '</nav>';
                                                                                                                            }else{
                                                                                                                                if($_GET['Page']=="BagiHasil"){
                                                                                                                                    echo '<h1><i class="bi bi-coin"></i> Bagi Hasil</h1>';
                                                                                                                                    echo '<nav>';
                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                    echo '      <li class="breadcrumb-item active">Bagi Hasil</li>';
                                                                                                                                    echo '  </ol>';
                                                                                                                                    echo '</nav>';
                                                                                                                                }else{
                                                                                                                                    if($_GET['Page']=="Komisi"){
                                                                                                                                        echo '<h1><i class="bi bi-coin"></i> Komisi</h1>';
                                                                                                                                        echo '<nav>';
                                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                        echo '      <li class="breadcrumb-item active">Komisi</li>';
                                                                                                                                        echo '  </ol>';
                                                                                                                                        echo '</nav>';
                                                                                                                                    }else{
                                                                                                                                        if($_GET['Page']=="TamplateWa"){
                                                                                                                                            echo '<h1><i class="bi bi-whatsapp"></i> Tamplate Whatsapp</h1>';
                                                                                                                                            echo '<nav>';
                                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                            echo '      <li class="breadcrumb-item active">Tamplate Whatsapp</li>';
                                                                                                                                            echo '  </ol>';
                                                                                                                                            echo '</nav>';
                                                                                                                                        }else{
                                                                                                                                            if($_GET['Page']=="RencanaKirim"){
                                                                                                                                                echo '<h1><i class="bi bi-calendar-check"></i> Rencana Kirim Pesan</h1>';
                                                                                                                                                echo '<nav>';
                                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                echo '      <li class="breadcrumb-item active">Rencana Kirim Pesan</li>';
                                                                                                                                                echo '  </ol>';
                                                                                                                                                echo '</nav>';
                                                                                                                                            }else{
                                                                                                                                                if($_GET['Page']=="WhatsappChatBox"){
                                                                                                                                                    echo '<h1><i class="bi bi-envelope"></i> Chat Box</h1>';
                                                                                                                                                    echo '<nav>';
                                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                    echo '      <li class="breadcrumb-item active">Chat Box</li>';
                                                                                                                                                    echo '  </ol>';
                                                                                                                                                    echo '</nav>';
                                                                                                                                                }else{
                                                                                                                                                    if($_GET['Page']=="Error"){
                                                                                                                                                        echo '<h1><i class="bi bi-emoji-angry"></i> Error</h1>';
                                                                                                                                                        echo '<nav>';
                                                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                        echo '      <li class="breadcrumb-item active">Error</li>';
                                                                                                                                                        echo '  </ol>';
                                                                                                                                                        echo '</nav>';
                                                                                                                                                    }else{
                                                                                                                                                        if($_GET['Page']=="SettingForm"){
                                                                                                                                                            echo '<h1><i class="bi bi-window-desktop"></i> Tamplate Form Medrek</h1>';
                                                                                                                                                            echo '<nav>';
                                                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                            echo '      <li class="breadcrumb-item active">Setting Form</li>';
                                                                                                                                                            echo '  </ol>';
                                                                                                                                                            echo '</nav>';
                                                                                                                                                        }else{
                                                                                                                                                            if($_GET['Page']=="NeracaSaldo"){
                                                                                                                                                                echo '<h1><i class="bi bi-list-check"></i> Neraca Saldo</h1>';
                                                                                                                                                                echo '<nav>';
                                                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                echo '      <li class="breadcrumb-item active">Neraca Saldo</li>';
                                                                                                                                                                echo '  </ol>';
                                                                                                                                                                echo '</nav>';
                                                                                                                                                            }else{
                                                                                                                                                                if($_GET['Page']=="Chating"){
                                                                                                                                                                    echo '<h1><i class="bi bi-chat"></i> Inbox</h1>';
                                                                                                                                                                    echo '<nav>';
                                                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                    echo '      <li class="breadcrumb-item active">Inbox</li>';
                                                                                                                                                                    echo '  </ol>';
                                                                                                                                                                    echo '</nav>';
                                                                                                                                                                }else{
                                                                                                                                                                    echo '<h1><i class="bi bi-emoji-angry"></i> Error</h1>';
                                                                                                                                                                    echo '<nav>';
                                                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                    echo '      <li class="breadcrumb-item active">Error</li>';
                                                                                                                                                                    echo '  </ol>';
                                                                                                                                                                    echo '</nav>';
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    echo '</div>';
?>
