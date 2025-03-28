<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i');
    $Sekarang=strtotime($now);
    //Validasi id_pelanggan tidak boleh kosong
    if(empty($_POST['id_pelanggan'])){
        $id_pelanggan="";
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
    }
    //Validasi id_kunjungan tidak boleh kosong
    if(empty($_POST['id_kunjungan'])){
        echo '<small class="text-danger">ID Kunjungan Tidak Boleh Kosong</small>';
    }else{
        //Validasi estimasi tidak boleh kosong
        if(empty($_POST['estimasi'])){
            echo '<small class="text-danger">Waktu layanan Tidak Boleh Kosong</small>';
        }else{
            //Validasi id_mitra tidak boleh kosong
            if(empty($_POST['id_mitra'])){
                echo '<small class="text-danger">ID Mitra Tidak Boleh Kosong</small>';
            }else{
                //Validasi id_hairstylist tidak boleh kosong
                if(empty($_POST['id_hairstylist'])){
                    echo '<small class="text-danger">ID Hairstylist Tidak Boleh Kosong</small>';
                }else{
                    //Validasi id_hairstylist_jadwal tidak boleh kosong
                    if(empty($_POST['id_hairstylist_jadwal'])){
                        echo '<small class="text-danger">Jadwal Tidak Boleh Kosong</small>';
                    }else{
                        //Validasi status tidak boleh kosong
                        if(empty($_POST['status'])){
                            echo '<small class="text-danger">Status Booking Tidak Boleh Kosong</small>';
                        }else{
                            //Validasi nama tidak boleh kosong
                            if(empty($_POST['nama'])){
                                echo '<small class="text-danger">Nama Pelanggan Tidak Boleh Kosong</small>';
                            }else{
                                //Validasi layanan yang di checklist
                                if(empty($_POST['id_mitra_layanan'])){
                                    echo '<small class="text-danger">Layanan yang dipilih Tidak Boleh Kosong</small>';
                                }else{
                                    $JumlahCheck=count($_POST['id_mitra_layanan']);
                                    $id_kunjungan=$_POST['id_kunjungan'];
                                    $NamaPelanggan=$_POST['nama'];
                                    $id_mitra=$_POST['id_mitra'];
                                    $id_hairstylist=$_POST['id_hairstylist'];
                                    $estimasi=$_POST['estimasi'];
                                    $id_hairstylist_jadwal=$_POST['id_hairstylist_jadwal'];
                                    $status=$_POST['status'];
                                    //Buka Jam mulai jadwal
                                    $QryJadwal = mysqli_query($Conn,"SELECT * FROM hairstylist_jadwal WHERE id_hairstylist_jadwal='$id_hairstylist_jadwal'")or die(mysqli_error($Conn));
                                    $Datajadwal = mysqli_fetch_array($QryJadwal);
                                    $jam_mulai= $Datajadwal['jam_mulai'];
                                    $jam_selesai= $Datajadwal['jam_selesai'];
                                    $jam_selesai= date('H:i', $jam_selesai);
                                    $jam_mulai= date('H:i', $jam_mulai);
                                    $quota= $Datajadwal['quota'];
                                    $WaktuMulai1="$estimasi $jam_mulai";
                                    $WaktuSelesai1="$estimasi $jam_selesai";
                                    $WaktuMulai=strtotime($WaktuMulai1);
                                    $WaktuSelesai=strtotime($WaktuSelesai1);
                                    //Update pelanggan_kunjungan
                                    $UpdateKunjungan = mysqli_query($Conn,"UPDATE pelanggan_kunjungan SET 
                                        id_pelanggan='$id_pelanggan',
                                        id_mitra='$id_mitra',
                                        id_hairstylist='$id_hairstylist',
                                        id_hairstylist_jadwal='$id_hairstylist_jadwal',
                                        estimasi='$WaktuMulai1',
                                        nama='$NamaPelanggan',
                                        status='$status'
                                    WHERE id_kunjungan='$id_kunjungan'") or die(mysqli_error($Conn)); 
                                    if($UpdateKunjungan){
                                        //Cari Id Transaksi
                                        $QryRincian = mysqli_query($Conn,"SELECT * FROM transaksi_rincian WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
                                        $DataRincian = mysqli_fetch_array($QryRincian);
                                        if(empty($DataRincian['id_transaksi'])){
                                            $id_transaksi="";
                                        }else{
                                            $id_transaksi= $DataRincian['id_transaksi'];
                                        }
                                        //Hapus data rincian
                                        $HapusRincian = mysqli_query($Conn, "DELETE FROM transaksi_rincian WHERE id_kunjungan='$id_kunjungan'") or die(mysqli_error($Conn));
                                        if($HapusRincian){
                                            $JumlahProses=0;
                                            foreach($_POST['id_mitra_layanan'] as $check) {
                                                //Buka harga layanan
                                                $QryLayanan = mysqli_query($Conn,"SELECT * FROM mitra_layanan WHERE id_mitra_layanan='$check'")or die(mysqli_error($Conn));
                                                $DataLayanan = mysqli_fetch_array($QryLayanan);
                                                $id_layanan= $DataLayanan['id_layanan'];
                                                $harga= $DataLayanan['harga'];
                                                $keterangan= $DataLayanan['keterangan'];
                                                $QryLayanan = mysqli_query($Conn,"SELECT * FROM layanan WHERE id_layanan='$id_layanan'")or die(mysqli_error($Conn));
                                                $DataLayanan = mysqli_fetch_array($QryLayanan);
                                                $id_layanan= $DataLayanan['id_layanan'];
                                                $nama_layanan= $DataLayanan['nama_layanan'];
                                                //Tambahkan ke data rincian
                                                $EntryRincian="INSERT INTO transaksi_rincian (
                                                    id_transaksi,
                                                    id_pelanggan,
                                                    id_barang,
                                                    id_kunjungan,
                                                    id_mitra,
                                                    id_mitra_layanan,
                                                    nama_barang,
                                                    nama_layanan,
                                                    harga,
                                                    qty,
                                                    jumlah,
                                                    updatetime
                                                ) VALUES (
                                                    '$id_transaksi',
                                                    '$id_pelanggan',
                                                    '0',
                                                    '$id_kunjungan',
                                                    '$id_mitra',
                                                    '$check',
                                                    '',
                                                    '$nama_layanan',
                                                    '$harga',
                                                    '1',
                                                    '$harga',
                                                    '$now'
                                                )";
                                                $InputRincian=mysqli_query($Conn, $EntryRincian);
                                                if($InputRincian){
                                                    $JumlahProses=$JumlahProses+1;
                                                }else{
                                                    $JumlahProses=$JumlahProses+0;
                                                }
                                            }
                                            if($JumlahProses==$JumlahCheck){
                                                $_SESSION ["NotifikasiSwal"]="Edit Booking Berhasil";
                                                echo '<small class="text-success" id="NotifikasiEditBookingBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data Rincian</small>';
                                            }
                                        }else{
                                            echo '<small class="text-danger">Terjadi Kesalahan Pada Saat menghapus Data </small>';
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