<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $tanggal=date('Y-m-d H:i');
    $TanggalBooking=date('Y-m-d H:i');
    $StrtotimeTanggal=strtotime($TanggalBooking);
    if(empty($_POST['id_kamar'])){
        echo 'ID Kamar Tidak Boleh Kosong.';
    }else{
        if(empty($_POST['id_bank'])){
            echo 'Metode Pembayaran Tidak Boleh Kosong.';
        }else{
            if(empty($_POST['TanggalCheckin'])){
                echo 'Tanggal Checkin Tidak Boleh Kosong.';
            }else{
                if(empty($_POST['TanggalCheckout'])){
                    echo 'Tanggal Checkout Tidak Boleh Kosong.';
                }else{
                    $id_kamar=$_POST['id_kamar'];
                    $id_bank=$_POST['id_bank'];
                    $TanggalCheckin=$_POST['TanggalCheckin'];
                    $TanggalCheckout=$_POST['TanggalCheckout'];
                    $date1=date_create($TanggalCheckin); //mis. tgl chekin
                    $date2=date_create($TanggalCheckout); //mis. tgl chekout
                    $diff=date_diff($date1,$date2); //menyimpan didalam fungsi date_dif
                    $JumlahHari=$diff->format("%d%"); //menampilkan jumlah hari
                    $ValidasiKetersediaan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_kamar='$id_kamar' AND checkin='$TanggalCheckin' AND (status_kamar='Booked' OR status_kamar='Checkin')"));
                    if($TanggalCheckout<$TanggalCheckin){
                        echo 'Tanggal Checkin Tidak Boleh Lebih Besar Dari Checkout.';
                    }else{
                        if(!empty($ValidasiKetersediaan)){
                            echo 'Kamar Tidak Tersedia Untuk Tanggal tersebut.';
                        }else{
                            //Buka detail kamar
                            $Sekarang=date('Y-m-d');
                            //Buka data kamar
                            $Qry = mysqli_query($Conn,"SELECT * FROM kamar WHERE id_kamar='$id_kamar'")or die(mysqli_error($Conn));
                            $data = mysqli_fetch_array($Qry);
                            $id_kamar= $data['id_kamar'];
                            $id_kategori= $data['id_kategori'];
                            $kategori= $data['kategori'];
                            $harga= $data['harga'];
                            $deskripsi= $data['deskripsi'];
                            $nama_kamar= $data['nama_kamar'];
                            $foto=$data['foto'];
                            $UrlFoto="assets/img/kamar/$foto";
                            $HargaFormat = "Rp " . number_format($harga,0,',','.');
                            //Cek ketersediaan kamar
                            $ValidasiKetersediaan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_kamar='$id_kamar' AND (status_kamar='Booked' OR status_kamar='Checkin')"));
                            //Menghitung reting
                            $JumlahDataReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_kamar='$id_kamar'"));
                            if(empty($JumlahDataReting)){
                                $JumlahReting=0;
                                $Reting=0;
                            }else{
                                $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(reting) AS reting FROM reting WHERE id_kamar='$id_kamar'"));
                                $JumlahReting = $Sum['reting'];
                                $Reting=$JumlahReting/$JumlahDataReting;
                            }
                            $Reting=round($Reting);
                            //Membuka data diskon
                            $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_kamar='$id_kamar' AND tanggal_mulai<='$Sekarang' AND tanggal_selesai>='$Sekarang'")or die(mysqli_error($Conn));
                            $DataDiskon = mysqli_fetch_array($QryDiskon);
                            if(!empty($DataDiskon['id_diskon'])){
                                $diskon=$DataDiskon['diskon'];
                                $NilaiDiskon=($diskon/100)*$harga;
                            }else{
                                $diskon="";
                                $NilaiDiskon=0;
                            }
                            $HargaSetelahDiskon=$harga-$NilaiDiskon;
                            $JumlahTagihan=$HargaSetelahDiskon*$JumlahHari;
                            $NilaiDiskonRp = "Rp " . number_format($NilaiDiskon,0,',','.');
                            $JumlahTagihanRp = "Rp " . number_format($JumlahTagihan,0,',','.');
                            $HargaSetelahDiskonRp = "Rp " . number_format($HargaSetelahDiskon,0,',','.');
                            //Mencari nilai id_transaksi
                            $QryTransaksi=mysqli_query($Conn, "SELECT max(id_transaksi) as id_transaksi FROM transaksi")or die(mysqli_error($Conn));
                            while($HasilNilai=mysqli_fetch_array($QryTransaksi)){
                                $IdmAx=$HasilNilai['id_transaksi'];
                            }
                            $id_transaksi=$IdmAx+1;
                            //Simpan Data Rincian
                            $entry="INSERT INTO transaksi (
                                id_transaksi,
                                id_pelanggan,
                                id_bank,
                                id_kamar,
                                tanggal,
                                checkin,
                                checkout,
                                harga,
                                jumlah_hari,
                                diskon,
                                jumlah,
                                status_pembayaran,
                                status_kamar
                            )VALUES (
                                '$id_transaksi', 
                                '$SessionIdPelanggan', 
                                '$id_bank', 
                                '$id_kamar', 
                                '$tanggal', 
                                '$TanggalCheckin', 
                                '$TanggalCheckout', 
                                '$harga', 
                                '$JumlahHari', 
                                '$NilaiDiskon', 
                                '$JumlahTagihan', 
                                'Pending', 
                                'Booked'
                            )";
                            $hasil=mysqli_query($Conn, $entry);
                            if($hasil){
                                $_SESSION ["NotifikasiSwal"]="Booking Berhasil";
                                echo '<span class="text-success" id="UrlBack">index.php?Page=Booking&Sub=Detail&id_transaksi='.$id_transaksi.'</span>';
                                echo '<span class="text-success" id="NotifikasiBookingBerhasil">Success</span>';
                            }else{
                                echo 'Terjadi Kesalahan Ketika Menyimpan Data Booking.';
                            }
                        }
                    }
                }
            }
        }
    }
?>