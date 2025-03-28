<?php
    //Menghitung Notifikasi Admin
    $JumlahTestimoniPending=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni WHERE status='Pending'"));
    $JumlahTransaksiPending=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE status_pembayaran='Pending'"));
    $JumlahChat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE status='Pending' AND kategori='PelangganToAdmin'"));
    $JumlahNotifikasi=$JumlahTransaksiPending+$JumlahChat+$JumlahTestimoniPending;
?>