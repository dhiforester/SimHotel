<?php
    if(empty($_GET['Page'])){
        include "_Page/Dashboard/Dashboard.php";
    }else{
        $Page=$_GET['Page'];
        if($Page=="Akses"){
            include "_Page/Akses/Akses.php";
        }else{
            if($Page=="Kamar"){
                include "_Page/Kamar/Kamar.php";
            }else{
                if($Page=="Diskon"){
                    include "_Page/Diskon/Diskon.php";
                }else{
                    if($Page=="SettingWhatsapp"||$Page=="SettingPayment"||$Page=="SettingEmail"){
                        include "_Page/SettingService/SettingService.php";
                    }else{
                        if($Page=="Laporan"){
                            include "_Page/Laporan/Laporan.php";
                        }else{
                            if($Page=="RegionalData"){
                                include "_Page/RegionalData/RegionalData.php";
                            }else{
                                if($Page=="Partnership"){
                                    include "_Page/Partnership/Partnership.php";
                                }else{
                                    if($Page=="EntitasAkses"){
                                        include "_Page/EntitasAkses/EntitasAkses.php";
                                    }else{
                                        if($Page=="MyProfile"){
                                            include "_Page/MyProfile/MyProfile.php";
                                        }else{
                                            if($Page=="Help"){
                                                include "_Page/Help/Help.php";
                                            }else{
                                                if($Page=="Layanan"){
                                                    include "_Page/Layanan/Layanan.php";
                                                }else{
                                                    if($Page=="Hairstylist"){
                                                        include "_Page/Hairstylist/Hairstylist.php";
                                                    }else{
                                                        if($Page=="JadwalPraktek"){
                                                            include "_Page/JadwalPraktek/JadwalPraktek.php";
                                                        }else{
                                                            if($Page=="Booking"){
                                                                include "_Page/Booking/Booking.php";
                                                            }else{
                                                                if($Page=="KontenWeb"){
                                                                    include "_Page/KontenWeb/KontenWeb.php";
                                                                }else{
                                                                    if($Page=="Error"){
                                                                        include "_Page/Error/Error.php";
                                                                    }else{
                                                                        if($Page=="Pelanggan"){
                                                                            include "_Page/Pelanggan/Pelanggan.php";
                                                                        }else{
                                                                            if($Page=="Barang"){
                                                                                include "_Page/Barang/Barang.php";
                                                                            }else{
                                                                                if($Page=="Transaksi"){
                                                                                    include "_Page/Transaksi/Transaksi.php";
                                                                                }else{
                                                                                    if($Page=="Pembayaran"){
                                                                                        include "_Page/Pembayaran/Pembayaran.php";
                                                                                    }else{
                                                                                        if($Page=="Aktivitas"){
                                                                                            include "_Page/Aktivitas/Aktivitas.php";
                                                                                        }else{
                                                                                            if($Page=="Testimoni"){
                                                                                                include "_Page/Testimoni/Testimoni.php";
                                                                                            }else{
                                                                                                if($Page=="SettingBank"){
                                                                                                    include "_Page/SettingBank/SettingBank.php";
                                                                                                }else{
                                                                                                    if($Page=="WhatsappGateway"){
                                                                                                        include "_Page/WhatsappGateway/WhatsappGateway.php";
                                                                                                    }else{
                                                                                                        if($Page=="Jurnal"){
                                                                                                            include "_Page/Jurnal/Jurnal.php";
                                                                                                        }else{
                                                                                                            if($Page=="BukuBesar"){
                                                                                                                include "_Page/BukuBesar/BukuBesar.php";
                                                                                                            }else{
                                                                                                                if($Page=="NeracaSaldo"){
                                                                                                                    include "_Page/NeracaSaldo/NeracaSaldo.php";
                                                                                                                }else{
                                                                                                                    if($Page=="LabaRugi"){
                                                                                                                        include "_Page/LabaRugi/LabaRugi.php";
                                                                                                                    }else{
                                                                                                                        if($Page=="RekapitulasiTransaksi"){
                                                                                                                            include "_Page/RekapitulasiTransaksi/RekapitulasiTransaksi.php";
                                                                                                                        }else{
                                                                                                                            if($Page=="Komisi"){
                                                                                                                                include "_Page/Komisi/Komisi.php";
                                                                                                                            }else{
                                                                                                                                if($Page=="BagiHasil"){
                                                                                                                                    include "_Page/BagiHasil/BagiHasil.php";
                                                                                                                                }else{
                                                                                                                                    if($Page=="TamplateWa"){
                                                                                                                                        include "_Page/TamplateWa/TamplateWa.php";
                                                                                                                                    }else{
                                                                                                                                        if($Page=="RencanaKirim"){
                                                                                                                                            include "_Page/RencanaKirim/RencanaKirim.php";
                                                                                                                                        }else{
                                                                                                                                            if($Page=="WhatsappChatBox"){
                                                                                                                                                include "_Page/WhatsappChatBox/WhatsappChatBox.php";
                                                                                                                                            }else{
                                                                                                                                                if($Page=="CetakInvoice"){
                                                                                                                                                    include "_Page/CetakInvoice/CetakInvoice.php";
                                                                                                                                                }else{
                                                                                                                                                    if($Page=="SettingForm"){
                                                                                                                                                        include "_Page/SettingForm/SettingForm.php";
                                                                                                                                                    }else{
                                                                                                                                                        if($Page=="Chating"){
                                                                                                                                                            include "_Page/Chating/Chating.php";
                                                                                                                                                        }else{
                                                                                                                                                            include "_Page/Dashboard/Dashboard.php";
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
?>