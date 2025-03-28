<label for="id_kategori">Kategori/Kelas</label>
<select name="id_kategori" id="id_kategori" class="form-control">
    <option value="">Pilih</option>
    <?php 
        //Array Data Kategori
        include "../../_Config/Connection.php";
        $QryKategori = mysqli_query($Conn, "SELECT*FROM kategori ORDER BY kategori ASC");
        while ($DataKategori = mysqli_fetch_array($QryKategori)) {
            $id_kategori= $DataKategori['id_kategori'];
            $kategori= $DataKategori['kategori'];
            echo '<option selected value="'.$id_kategori.'">'.$kategori.'</option>';
        }
    ?>
</select>