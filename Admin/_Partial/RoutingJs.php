<?php 
    if(empty($_GET['Page'])){
        echo '<script type="text/javascript" src="_Page/Dashboard/Dashboard.js"></script>';
    }else{
        if($_GET['Page']=="Akses"){
            echo '<script type="text/javascript" src="_Page/Akses/Akses.js"></script>';
        }else{
            if($_GET['Page']=="Kamar"){
                echo '<script type="text/javascript" src="_Page/Kamar/Kamar.js"></script>';
            }else{
                if($_GET['Page']=="Diskon"){
                    echo '<script type="text/javascript" src="_Page/Diskon/Diskon.js"></script>';
                }else{
                    if($Page=="SettingWhatsapp"||$Page=="SettingPayment"||$Page=="SettingEmail"){
                        echo '<script type="text/javascript" src="_Page/SettingService/SettingService.js"></script>';
                    }else{
                        if($Page=="Laporan"){
                            echo '<script type="text/javascript" src="_Page/Laporan/Laporan.js"></script>';
                        }else{
                            if($Page=="RegionalData"){
                                echo '<script type="text/javascript" src="_Page/RegionalData/RegionalData.js"></script>';
                            }else{
                                if($Page=="Partnership"){
                                    echo '<script type="text/javascript" src="_Page/Partnership/Partnership.js"></script>';
                                }else{
                                    if($Page=="EntitasAkses"){
                                        echo '<script type="text/javascript" src="_Page/EntitasAkses/EntitasAkses.js"></script>';
                                    }else{
                                        if($Page=="MyProfile"){
                                            echo '<script type="text/javascript" src="_Page/MyProfile/MyProfile.js"></script>';
                                        }else{
                                            if($Page=="Help"){
                                                echo '<script type="text/javascript" src="_Page/Help/Help.js"></script>';
                                            }else{
                                                if($Page=="Layanan"){
                                                    echo '<script type="text/javascript" src="_Page/Layanan/Layanan.js"></script>';
                                                }else{
                                                    if($Page=="Testimoni"){
                                                        echo '<script type="text/javascript" src="_Page/Testimoni/Testimoni.js"></script>';
                                                    }else{
                                                        if($Page=="JadwalPraktek"){
                                                            echo '<script type="text/javascript" src="_Page/JadwalPraktek/JadwalPraktek.js"></script>';
                                                        }else{
                                                            if($Page=="Booking"){
                                                                echo '<script type="text/javascript" src="_Page/Booking/Booking.js"></script>';
                                                            }else{
                                                                if($Page=="KontenWeb"){
                                                                    echo '<script type="text/javascript" src="_Page/KontenWeb/KontenWeb.js"></script>';
                                                                }else{
                                                                    if($Page=="Pendaftaran"){
                                                                        // echo '<script type="text/javascript" src="_Page/Pendaftaran/Pendaftaran.js"></script>';
                                                                    }else{
                                                                        if($Page=="Barang"){
                                                                            echo '<script type="text/javascript" src="_Page/Barang/Barang.js"></script>';
                                                                        }else{
                                                                            if($Page=="Transaksi"){
                                                                                echo '<script type="text/javascript" src="_Page/Transaksi/Transaksi.js"></script>';
                                                                            }else{
                                                                                if($Page=="Pembayaran"){
                                                                                    echo '<script type="text/javascript" src="_Page/Pembayaran/Pembayaran.js"></script>';
                                                                                }else{
                                                                                    if($Page=="Aktivitas"){
                                                                                        echo '<script type="text/javascript" src="_Page/Aktivitas/Aktivitas.js"></script>';
                                                                                    }else{
                                                                                        if($Page=="Pelanggan"){
                                                                                            echo '<script type="text/javascript" src="_Page/Pelanggan/Pelanggan.js"></script>';
                                                                                        }else{
                                                                                            if($Page=="SettingBank"){
                                                                                                echo '<script type="text/javascript" src="_Page/SettingBank/SettingBank.js"></script>';
                                                                                            }else{
                                                                                                if($Page=="Klaim"){
                                                                                                    echo '<script type="text/javascript" src="_Page/Klaim/Klaim.js"></script>';
                                                                                                }else{
                                                                                                    if($Page=="Jurnal"){
                                                                                                        echo '<script type="text/javascript" src="_Page/Jurnal/Jurnal.js"></script>';
                                                                                                    }else{
                                                                                                        if($Page=="BukuBesar"){
                                                                                                            echo '<script type="text/javascript" src="_Page/BukuBesar/BukuBesar.js"></script>';
                                                                                                        }else{
                                                                                                            if($Page=="NeracaSaldo"){
                                                                                                                echo '<script type="text/javascript" src="_Page/NeracaSaldo/NeracaSaldo.js"></script>';
                                                                                                            }else{
                                                                                                                if($Page=="LabaRugi"){
                                                                                                                    echo '<script type="text/javascript" src="_Page/LabaRugi/LabaRugi.js"></script>';
                                                                                                                }else{
                                                                                                                    if($Page=="RekapitulasiTransaksi"){
                                                                                                                        echo '<script type="text/javascript" src="_Page/RekapitulasiTransaksi/RekapitulasiTransaksi.js"></script>';
                                                                                                                    }else{
                                                                                                                        if($Page=="Komisi"){
                                                                                                                            echo '<script type="text/javascript" src="_Page/Komisi/Komisi.js"></script>';
                                                                                                                        }else{
                                                                                                                            if($Page=="BagiHasil"){
                                                                                                                                echo '<script type="text/javascript" src="_Page/BagiHasil/BagiHasil.js"></script>';
                                                                                                                            }else{
                                                                                                                                if($Page=="TamplateWa"){
                                                                                                                                    echo '<script type="text/javascript" src="_Page/TamplateWa/TamplateWa.js"></script>';
                                                                                                                                }else{
                                                                                                                                    if($Page=="RencanaKirim"){
                                                                                                                                        echo '<script type="text/javascript" src="_Page/RencanaKirim/RencanaKirim.js"></script>';
                                                                                                                                    }else{
                                                                                                                                        if($Page=="WhatsappChatBox"){
                                                                                                                                            echo '<script type="text/javascript" src="_Page/WhatsappChatBox/WhatsappChatBox.js"></script>';
                                                                                                                                        }else{
                                                                                                                                            if($Page=="SettingForm"){
                                                                                                                                                echo '<script type="text/javascript" src="_Page/SettingForm/SettingForm.js"></script>';
                                                                                                                                            }else{
                                                                                                                                                if($Page=="CronJob"){
                                                                                                                                                    echo '<script type="text/javascript" src="_Page/CronJob/CronJob.js"></script>';
                                                                                                                                                }else{
                                                                                                                                                    if($Page=="Chating"){
                                                                                                                                                        echo '<script type="text/javascript" src="_Page/Chating/Chating.js"></script>';
                                                                                                                                                    }else{
                                                                                                                                                        echo '<script type="text/javascript" src="_Page/Dashboard/Dashboard.js"></script>';
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
    //default Login
    echo '<script type="text/javascript" src="_Page/Login/Login.js"></script>';
    echo '<script type="text/javascript" src="_Page/ResetPassword/ResetPassword.js"></script>';
?>