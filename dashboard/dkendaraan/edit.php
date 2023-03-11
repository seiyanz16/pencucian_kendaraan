<?php
include('../connectDB/koneksi.php');

// query untuk mendapatkan semua data customer
$sql_all_customer = "SELECT * FROM customer";
$result_all_customer = mysqli_query($conn, $sql_all_customer);

// query untuk mendapatkan semua data jenis kendaraan
$jkendaraan = "SELECT * FROM jenis_kendaraan";
$jkendaraan_result = mysqli_query($conn, $jkendaraan);


?>
<form action="dkendaraan/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Ubah Data Kendaraan</h5>
            <div class="mt-3 mb-3">
                <label for="plat" class="form-label">Plat Nomor</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['plat']; ?>" type="text" class="form-control" id="plat"
                    placeholder="Masukkan Plat" name="plat">
            </div>
            <div class="mt-3 mb-3">
                <label for="idjenis" class="form-label">Jenis</label>
                <select class="form-select" id="idjkendaraan" name="idjkendaraan" required>
                    <option selected disabled value="">Pilih Jenis</option>
                    <?php
                    if (mysqli_num_rows($jkendaraan_result) > 0) {
                        while ($row = mysqli_fetch_assoc($jkendaraan_result)) {
                            $selected = ($row['idjkendaraan'] == $data['idjkendaraan']) ? 'selected' : '';
                            echo "<option value='" . $row['idjkendaraan'] . "' $selected>" . $row['jenis'] . "</option>";
                        }
                    } else {
                        echo "<option disabled>Tidak ada data</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['merk']; ?>" type="text" class="form-control" id="merk"
                    placeholder="Masukkan Merk" name="merk">
            </div>
            <div class="mt-3 mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['warna']; ?>" type="text" class="form-control" id="warna"
                    placeholder="Masukkan Warna" name="warna">
            </div>
            <div class="mb-3">
                <label for="tglmasuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" value="<?= $_GET['tglmasuk']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="tglkeluar">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tglkeluar" name="tglkeluar"
                    value="<?= $_GET['tglkeluar']; ?>" required>
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

            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=dkendaraan" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>