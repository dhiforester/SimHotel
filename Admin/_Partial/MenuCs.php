<aside id="sidebar" class="sidebar menu_background">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu==""){echo "";}else{echo "collapsed";} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu=="Akses"||$PageMenu=="EntitasAkses"){echo "";}else{echo "collapsed";} ?>" href="index.php?Page=Akses">
                <i class="bi bi-key"></i>
                <span>Akses</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Pelanggan"){echo "collapsed";} ?>" href="index.php?Page=Pelanggan">
                <i class="bi bi-people-fill"></i>
                <span>Pelanggan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Kamar"){echo "collapsed";} ?>" href="index.php?Page=Kamar">
                <i class="bi bi-building"></i>
                <span>Kamar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Diskon"){echo "collapsed";} ?>" href="index.php?Page=Diskon">
                <i class="bi bi-gift"></i>
                <span>Diskon</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Transaksi"){echo "collapsed";} ?>" href="index.php?Page=Transaksi">
                <i class="bi bi-cash-stack"></i>
                <span>Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Chating"){echo "collapsed";} ?>" href="index.php?Page=Chating">
                <i class="bi bi-chat"></i>
                <span>Chating</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Testimoni"){echo "collapsed";} ?>" href="index.php?Page=Testimoni">
                <i class="bi bi-chat-right-quote"></i>
                <span>Testimoni</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Reting"){echo "collapsed";} ?>" href="index.php?Page=Reting">
                <i class="bi bi-star"></i>
                <span>Reting</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="SettingBank"){echo "collapsed";} ?>" href="index.php?Page=SettingBank">
                <i class="bi bi-bank"></i>
                <span>Bank</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Laporan"){echo "collapsed";} ?>" href="index.php?Page=Laporan">
                <i class="bi bi-bar-chart"></i>
                <span>Laporan</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link <?php if($PageMenu!=="Help"){echo "collapsed";} ?>" href="index.php?Page=Help&Sub=HelpData">
                <i class="bi bi-question"></i>
                <span>Bantuan</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</aside>