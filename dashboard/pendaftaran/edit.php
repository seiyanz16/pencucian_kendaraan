<?php
include('../connectDB/koneksi.php');
// query untuk mendapatkan semua data customer
$sql_all_customer = "SELECT * FROM customer";
$result_all_customer = mysqli_query($conn, $sql_all_customer);
?>
<form action="pendaftaran/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Ubah Pendaftaran</h5>
            <div class="mt-3 mb-3">
                <label for="antrean" class="form-label">Antrean</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['antrean']; ?>" type="text" class="form-control" id="antrean"
                    placeholder="Masukkan Antrean" name="antrean">
            </div>
            <div class="mt-3 mb-3">
                <label for="nama">Nama Customer</label>
                <select class="form-control" id="idcustomer" name="idcustomer" required>
                    <option value="" selected>Pilih Customer</option>
                    <?php
                    while ($row_customer = mysqli_fetch_assoc($result_all_customer)) {
                        $selected = ($row_customer['idcustomer'] == $data['idcustomer']) ? 'selected' : '';
                        echo '<option value="' . $row_customer['idcustomer'] . '" ' . $selected . '>' . $row_customer['nama'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tgl_pendaftaran">Tanggal Pendaftaran</label>
                <input type="date" class="form-control" id="tgl_pendaftaran" name="tgl_pendaftaran"
                    value="<?= $_GET['tglpendaftaran']; ?>" required>
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=pendaftaran" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>