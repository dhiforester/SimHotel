<?php
    if(!empty($_SESSION['NotifikasiSwal'])){
        $NotifikasiSwal=$_SESSION['NotifikasiSwal'];
?>
    <!------- Notifikasi ------------>
    <?php if($NotifikasiSwal=="Login Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Login Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Akses Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Tambah Akses Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Akses Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Hapus Akses Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Atur Akses Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Atur Akses Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Kamar Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Tambah Kamar Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Verifikasi Akun Mitra Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Verifikasi Akun Mitra Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Mitra Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Tambah Mitra Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Update Logo Mitra Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Update Logo Mitra Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Update Info Mitra Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Update Info Mitra Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Pelanggan Berhasil"){ ?>
        <script>
            swal("Berhasil!", "Tambah Pelanggan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Setting General Berhasil"){ ?>
        <script>
            swal("Success!", "Save General Settings Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Setting Whatsapp Berhasil"){ ?>
        <script>
            swal("Success!", "Save Whatsapp Settings Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Setting Payment Berhasil"){ ?>
        <script>
            swal("Success!", "Save Payment Settings Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Setting Email Berhasil"){ ?>
        <script>
            swal("Success!", "Save Email Settings Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Kirim Email Berhasil"){ ?>
        <script>
            swal("Success!", "Send Email Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Dokumentasi API Berhasil"){ ?>
        <script>
            swal("Success!", "Save API Documentation Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Mitra Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Partner Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Pasien Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Patient Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Akses Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Access Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Password Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Password Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Help Berhasil"){ ?>
        <script>
            swal("Success!", "Save content data successfully", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Help Berhasil"){ ?>
        <script>
            swal("Success!", "Delete content data successfully", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Kunjungan Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Kunjungan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Konten Web Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Konten Web Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Layanan Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Layanan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Layanan Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Layanan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Layanan Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Layanan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Booking Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Booking Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Booking Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Booking Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Metode Transaksi Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Metode Transaksi Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Status Transaksi Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Status Transaksi Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Rincian Detail Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Rincian Detail Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Rincian Detail Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Rincian Detail Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Klaim Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Klaim Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Klaim Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Klaim Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Klaim Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Klaim Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Kirim Pesan Berhasil"){ ?>
        <script>
            swal("Success!", "Kirim Pesan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Form Setting Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Form Setting Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Form Setting Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Form Setting Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Draft Medrek Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Draft Medrek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Draft Medrek Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Draft Medrek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Jadwal Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Jadwal Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Jadwal Hairstylist Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Jadwal Hairstylist Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Wilayah Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Wilayah Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Hairstylist Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Hairstylist Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Kategori Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Kategori Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Barang Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Barang Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Galeri Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Galeri Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Transaksi Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Transaksi Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Jadwal Praktek Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Jadwal Praktek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Testimoni Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Testimoni Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah FAQ Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah FAQ Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Rekening Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Rekening Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Atur Halaman Web Berhasil"){ ?>
        <script>
            swal("Success!", "Atur Halaman Web Berhasil", "success");
        </script>
    <?php } ?>
<?php 
    unset($_SESSION['NotifikasiSwal']);
    }
?>