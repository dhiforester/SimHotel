<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i');
    if(empty($SessionIdPelanggan)){
        echo '<span class="text-center">';
        echo '  Silahkan login terlebih dulu sebelum mengirim pesan!';
        echo '</span>';
    }else{
        if(empty($_POST['pesan'])){
            echo '<span class="text-center">';
            echo '  Isi Pesan Tidak Boleh Kosong!';
            echo '</span>';
        }else{
            $id_mitra="0";
            $id_pelanggan=$SessionIdPelanggan;
            $pesan=$_POST['pesan'];
            $kategori="PelangganToAdmin";
            $JumlahKarakterKomentar=strlen($_POST['pesan']);
            if($JumlahKarakterKomentar>200){
                echo '<span class="text-center">';
                echo '  Pesan tidak boleh lebih dari 200 karakter!';
                echo '</span>';
            }else{
                //Cek Data Chat
                $DuplikatChat= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE id_pelanggan='$SessionIdPelanggan' AND pesan='$pesan' AND tanggal='$now' AND kategori='$kategori'"));
                //Validasi Dulikat
                if(!empty($DuplikatChat)){
                    echo '<span class="text-center">';
                    echo '  Pesan Tersebut sudah Ada!';
                    echo '</span>';
                }else{
                    //Tambahkan ke data Chat
                    $EntryChat="INSERT INTO chating (
                        kategori,
                        id_akses,
                        id_pelanggan,
                        tanggal,
                        pesan,
                        status
                    ) VALUES (
                        '$kategori',
                        '0',
                        '$SessionIdPelanggan',
                        '$now',
                        '$pesan',
                        'Pending'
                    )";
                    $InputChat=mysqli_query($Conn, $EntryChat);
                    if($InputChat){
                        $_SESSION ["NotifikasiSwal"]="Kirim Pesan Berhasil";
                        echo '<span class="text-success" id="NotifikasiKirimChatAdminBerhasil">Success</span>';
                    }else{
                        echo '<span class="text-center">';
                        echo '  Kirim Pesan Gagal';
                        echo '</span>';
                    }
                }
            }
        }
    }
?>