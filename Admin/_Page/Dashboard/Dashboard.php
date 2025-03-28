<?php
    $tahun_ini=date('Y');
    //Jumlah akses
    $JumlahAkses = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
    //Jumlah Pelanggan
    $JumlahPelanggan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan"));
    //Jumlah Kamar
    $JumlahKamar = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM kamar"));
    //Jumlah Akun Bank
    $JumlahAkunBank = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM bank"));
    //Jumlah Testimoni
    $JumlahTestimoni = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni"));
    //Jumlah Transaksi Tahun Ini
    $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi WHERE tanggal like '%$tahun_ini%'"));
    $jumlah_transaksi = $Sum['jumlah'];
    $jumlah_transaksi = "" . number_format($jumlah_transaksi,0,',','.');
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card blue-card">
                        <div class="card-body">
                            <h5 class="card-title">User</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-key"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $JumlahAkses;?></h6>
                                    <span class="text-muted small pt-2 ps-1">Akun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pelanggan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $JumlahPelanggan ;?></h6>
                                    <span class="text-muted small pt-2 ps-1">Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Kamar</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $JumlahKamar;?></h6>
                                    <span class="text-muted small pt-2 ps-1">Kamar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $jumlah_transaksi;?></h6>
                                    <span class="text-muted small pt-2 ps-1">IDR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Reports -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Transaksi <span>/ Periode Tahun <?php echo date('Y') ?></span></h5>
                            <div id="TransaksiChart">
                                <!-- Line Chart -->
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#TransaksiChart"), {
                                    series: [
                                        {
                                            name: 'Transaksi',
                                            data: [
                                                    <?php
                                                        date_default_timezone_set('UTC');
                                                        //Looping 12 Kali
                                                        for ($bulan=1; $bulan<=12; $bulan++ ){
                                                            $Bulan=sprintf("%02d", $bulan);
                                                            $TahunSekarang=date('Y');
                                                            $TahunBulan="$TahunSekarang-$Bulan";
                                                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi WHERE tanggal like '%$TahunBulan%'"));
                                                            if(empty($SumTransaksi['jumlah'])){
                                                                $JumlahTransaksi =0;
                                                            }else{
                                                                $JumlahTransaksi = $SumTransaksi['jumlah'];
                                                            }
                                                            
                                                            echo ''.$JumlahTransaksi.', ';
                                                        }
                                                    ?>
                                                ],
                                        }, 
                                            // {
                                            //     name: 'Revenue',
                                            //     data: [11, 32, 45, 32, 34, 52, 41]
                                            // }, 
                                            // {
                                            //     name: 'Customers',
                                            //     data: [15, 11, 32, 18, 9, 24, 11]
                                            // }
                                        ],
                                    chart: {
                                    height: 350,
                                    type: 'bar',
                                    toolbar: {
                                        show: false
                                    },
                                    },
                                    markers: {
                                    size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                    },
                                    dataLabels: {
                                    enabled: false
                                    },
                                    stroke: {
                                    curve: 'smooth',
                                    width: 2
                                    },
                                    xaxis: {
                                    type: 'text',
                                    categories: [
                                        <?php
                                            //Looping 12 Kali
                                            for ($bulan=1; $bulan<=12; $bulan++ ){
                                                $Bulan=sprintf("%02d", $bulan);
                                                $TahunSekarang=date('Y');
                                                $TahunBulan="$TahunSekarang-$Bulan-01";
                                                $Mikrotime=strtotime($TahunBulan);
                                                $LabelBulanTahun=date('F y', $Mikrotime);
                                                echo '"'.$LabelBulanTahun.'", ';
                                            }
                                        ?>
                                    ]
                                    },
                                    tooltip: {
                                    x: {
                                        format: 'dd/MM/yy HH:mm'
                                    },
                                    }
                                }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Reservasi <span>/ Periode Tahun <?php echo date('Y') ?></span></h5>
                            <div id="ReservasiChart">
                                <!-- Line Chart -->
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#ReservasiChart"), {
                                    series: [
                                        {
                                            name: 'Reservasi',
                                            data: [
                                                    <?php
                                                        date_default_timezone_set('UTC');
                                                        //Looping 12 Kali
                                                        for ($bulan=1; $bulan<=12; $bulan++ ){
                                                            $Bulan=sprintf("%02d", $bulan);
                                                            $TahunSekarang=date('Y');
                                                            $TahunBulan="$TahunSekarang-$Bulan";
                                                            if(empty(mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi  WHERE tanggal like '%$TahunBulan%'")))){
                                                                $JumlahReservasi=0;
                                                            }else{
                                                                $JumlahReservasi=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi  WHERE tanggal like '%$TahunBulan%'"));
                                                            }
                                                            
                                                            echo ''.$JumlahReservasi.', ';
                                                        }
                                                    ?>
                                                ],
                                        }, 
                                            // {
                                            //     name: 'Revenue',
                                            //     data: [11, 32, 45, 32, 34, 52, 41]
                                            // }, 
                                            // {
                                            //     name: 'Customers',
                                            //     data: [15, 11, 32, 18, 9, 24, 11]
                                            // }
                                        ],
                                    chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                    },
                                    markers: {
                                    size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                    },
                                    dataLabels: {
                                    enabled: false
                                    },
                                    stroke: {
                                    curve: 'smooth',
                                    width: 2
                                    },
                                    xaxis: {
                                    type: 'text',
                                    categories: [
                                        <?php
                                            //Looping 12 Kali
                                            for ($bulan=1; $bulan<=12; $bulan++ ){
                                                $Bulan=sprintf("%02d", $bulan);
                                                $TahunSekarang=date('Y');
                                                $TahunBulan="$TahunSekarang-$Bulan-01";
                                                $Mikrotime=strtotime($TahunBulan);
                                                $LabelBulanTahun=date('F y', $Mikrotime);
                                                echo '"'.$Bulan.'", ';
                                            }
                                        ?>
                                    ]
                                    },
                                    tooltip: {
                                    x: {
                                        format: 'dd/MM/yy HH:mm'
                                    },
                                    }
                                }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>