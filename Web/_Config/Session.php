<?php
    //Menangkap seasson kemudian menampilkannya
    session_start();
    if(!empty($_SESSION["id_pelanggan"])){
        $SessionIdPelanggan=$_SESSION ["id_pelanggan"];
        //Inisiasi data akses dari database
        $QuerySessionAkses = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$SessionIdPelanggan'")or die(mysqli_error($Conn));
        $DataSessionAkses = mysqli_fetch_array($QuerySessionAkses);
        //Apabila data akses ada
        if(!empty($DataSessionAkses['id_pelanggan'])){
            //rincian profile user
            $SessionNama= $DataSessionAkses['nama'];
            $SessionEmail= $DataSessionAkses['email'];
            $SessionKontak= $DataSessionAkses['kontak'];
            $SessionAlamat= $DataSessionAkses['alamat'];
            $SessionPassword= $DataSessionAkses['password'];
            $SessionTanggalDaftar= $DataSessionAkses['tanggal_daftar'];
            $SessionNoIdentitas= $DataSessionAkses['no_identitas'];
            if(!empty($DataSessionAkses['foto'])){
                $SessionGambar= $DataSessionAkses['foto'];
            }else{
                $SessionGambar="No-Image.png";
            }
        }else{
            //rincian profile user
            $SessionNama="";
            $SessionEmail="";
            $SessionKontak="";
            $SessionAlamat="";
            $SessionPassword="";
            $SessionTanggalDaftar="";
            $SessionNoIdentitas="";
            if(!empty($DataSessionAkses['foto'])){
                $SessionGambar="";
            }else{
                $SessionGambar="";
            }
        }
    }else{
        $SessionIdPelanggan=0;
    }
?>
