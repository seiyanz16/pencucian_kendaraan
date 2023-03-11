<?php 
include('../connectDB/koneksi.php');
$sql = "SELECT * FROM customer";
$customer_result = mysqli_query($conn, $sql);
?>
<form action="pendaftaran/store.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Tambah Pendaftaran</h5>
            <div class="mt-3 mb-3">
                <label for="antrean" class="form-label">Antrean</label>
                <input required type="text" class="form-control" id="antrean" placeholder="Masukkan antrean" name="antrean">
            </div>
            <div class="mb-3">
                <label for="idcustomer" class="form-label">Nama</label>
                <select class="form-select" id="idcustomer" name="idcustomer" required>
                    <option selected disabled value="">Pilih Nama</option>
                    <?php
                    if (mysqli_num_rows($customer_result) > 0) {
                        while ($row = mysqli_fetch_assoc($customer_result)) {
                            echo "<option value='" . $row['idcustomer'] . "'>" . $row['nama'] . "</option>";
                        }
                    } else {
                        echo "<option disabled>Tidak ada data</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                <input type="date" class="form-control" id="tgl_pendaftaran" name="tgl_pendaftaran" required>
            </div>
            <div class="card-footer mt-4">
                <button type="submit" href="#" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=pendaftaran" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>