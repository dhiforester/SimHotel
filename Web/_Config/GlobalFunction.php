<?php
    function JumlahDataTableByKolom($NamaTabel,$NamaKolom,$Pencarian){
        //Menghitung jumlah list pada tabel
        include "_Config/Connection.php";
        $JumlahDataTableByKolom = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM $NamaTabel WHERE $NamaKolom='$Pencarian'"));
        return $JumlahDataTableByKolom;
    }
    function JumlahSlider(){
        //Menghitung jumlah list pada tabel
        include "_Config/Connection.php";
        $JumlahSlider = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_url WHERE kategori_url='Slider'"));
        return $JumlahSlider;
    }
?>