
<?php

    //Menghitung Jumlah
    //Chat Dengan Admin
    $JumlahChatAdmin = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE id_pelanggan='$SessionIdPelanggan' AND (kategori='AdminToPelanggan' OR kategori='PelangganToAdmin')"));
    //Jumlah Transaksi
    $JumlahChatMitra = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE id_pelanggan='$SessionIdPelanggan' AND (kategori='MitraToPelanggan' OR kategori='PelangganToMitra')"));
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Inbox</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Inbox Pelanggan</span></h2>
    <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <a href="javascript:void(0);" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#ModalChatAdmin">
                    <i class="bi bi-plus"></i>  Hubungi Admin
                </a>
                <div class="row">
                    <div class="col-md-12 mt-4 mb-4 table table-responsive pre-scrollable">
                        <table class="table">
                            <tbody>
                                <?php
                                    //Menampilkan list Chat Pelanggan dengan mitra
                                    if(empty($JumlahChatAdmin)){
                                        echo '<tr>';
                                        echo '  <td colspan="3" class="text-center text-danger">Belum Ada Percakapan</td>';
                                        echo '</tr>';
                                    }else{
                                        //Buka data Chat
                                        $QryChatAdminDenganMitra = mysqli_query($Conn, "SELECT * FROM chating WHERE id_pelanggan='$SessionIdPelanggan' AND (kategori='AdminToPelanggan' OR kategori='PelangganToAdmin') ORDER BY id_chating ASC");
                                        while ($DataChatPelangganDanAdmin = mysqli_fetch_array($QryChatAdminDenganMitra)) {
                                            $id_chating= $DataChatPelangganDanAdmin['id_chating'];
                                            $TanggalChat= $DataChatPelangganDanAdmin['tanggal'];
                                            $kategori= $DataChatPelangganDanAdmin['kategori'];
                                            $IsiPesan= $DataChatPelangganDanAdmin['pesan'];
                                            //Format Tanggal
                                            $strtotime2=strtotime($TanggalChat);
                                            $TanggalFormat=date('d/m/Y H:i',$strtotime2);
                                            if($kategori=="AdminToPelanggan"){
                                                //Ubah Status Menjadi Dibaca
                                                $UpdateStatus = mysqli_query($Conn,"UPDATE chating SET 
                                                    status='Dibaca'
                                                WHERE id_chating='$id_chating'") or die(mysqli_error($Conn)); 
                                                $Pengirim='<span class="text-info">Admin</span>';
                                            }else{
                                                $Pengirim='<span class="text-warning">Anda</span>';
                                            }
                                            echo '<tr>';
                                            echo '  <td>';
                                            echo '      <b>'.$Pengirim.'</b><br>';
                                            echo '      '.$IsiPesan.'<br>';
                                            echo '      <small>'.$TanggalFormat.'</small>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->