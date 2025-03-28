<header id="header" class="header fixed-top d-flex align-items-center nav_background">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/<?php echo "$favicon"; ?>" alt="">
            <span class="d-none d-lg-block text-white"><?php echo "$title_page"; ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon text-light" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <?php
                        if(!empty($JumlahNotifikasi)){
                            echo '<span class="badge bg-danger rounded-pill badge-number">'.$JumlahNotifikasi.'</span>';
                        }
                    ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        <?php
                            if(!empty($JumlahNotifikasi)){
                                echo 'You have '.$JumlahNotifikasi.' new notifications';
                            }else{
                                echo 'No notifications found';
                            }
                        ?>
                    </li>
                    <?php
                        if(!empty($JumlahTransaksiPending)){
                            echo '<li><hr class="dropdown-divider"></li>';
                            echo '<li class="notification-item">';
                            echo '  <i class="bi bi-check-circle text-success"></i>';
                            echo '  <div>';
                            echo '      <h4><a href="index.php?Page=Transaksi">Transaction Request</a></h4>';
                            echo '      <p>You have '.$JumlahTransaksiPending.' partner requests</p>';
                            echo '  </div>';
                            echo '</li>';
                        }
                        if(!empty($JumlahChat)){
                            echo '<li><hr class="dropdown-divider"></li>';
                            echo '<li class="notification-item">';
                            echo '  <i class="bi bi-check-circle text-success"></i>';
                            echo '  <div>';
                            echo '      <h4><a href="index.php?Page=Chating">Pesan Baru</a></h4>';
                            echo '      <p>Ada '.$JumlahChat.' Pesan Baru</p>';
                            echo '  </div>';
                            echo '</li>';
                        }
                        if(!empty($JumlahTestimoniPending)){
                            echo '<li><hr class="dropdown-divider"></li>';
                            echo '<li class="notification-item">';
                            echo '  <i class="bi bi-check-circle text-success"></i>';
                            echo '  <div>';
                            echo '      <h4><a href="index.php?Page=Testimoni"> Testimoni Menggu Verifikasi</a></h4>';
                            echo '      <p>Ada '.$JumlahTestimoniPending.' Testimoni Menunggu Verifikasi</p>';
                            echo '  </div>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </li>
            
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/Akses/<?php echo $SessionGambar;?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $SessionNama;?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $SessionNama;?></h6>
                        <span><?php echo $SessionAkses;?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile">
                            <i class="bi bi-person"></i>
                            <span>Profile Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile&Sub=EditProfile&id_akses=<?php echo "$SessionIdAkses"; ?>">
                            <i class="bi bi-gear"></i>
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile&Sub=ChangePassword&id_akses=<?php echo "$SessionIdAkses"; ?>">
                            <i class="bi bi-key"></i>
                            <span>Ganti Password</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?Page=Help&Sub=HelpHome">
                            <i class="bi bi-question-circle"></i>
                            <span>Butuh Bantuan?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>