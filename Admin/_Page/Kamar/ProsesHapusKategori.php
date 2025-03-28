<?php
    //Connection
    session_start();
    include "../../_Config/Connection.php";
    if(empty($_POST['id_kategori'])){
        echo '<span class="text-danger">ID null</span>';
    }else{
        $id_kategori=$_POST['id_kategori'];
        //Proses hapus data
        $Hapus = mysqli_query($Conn, "DELETE FROM kategori WHERE id_kategori='$id_kategori'") or die(mysqli_error($Conn));
        if ($Hapus) {
            echo '<span class="text-success" id="NotifikasiHapusKategori">Ok</span>';
        }else{
            echo '<span class="text-danger">Error</span>';
        }
    }
?>