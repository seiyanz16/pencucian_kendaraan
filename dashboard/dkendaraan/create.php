<?php 
include('../connectDB/koneksi.php');
$customer = "SELECT * FROM customer";
$jkendaraan = "SELECT * FROM jenis_kendaraan";
$customer_result = mysqli_query($conn, $customer);
$jkendaraan_result = mysqli_query($conn, $jkendaraan);
?>
<form action="dkendaraan/store.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Kendaraan</h5>
            <div class="mt-3 mb-3">
                <label for="plat" class="form-label">Plat Nomor</label>
                <input required type="text" class="form-control" id="plat" placeholder="Masukkan Plat Nomor" name="plat">
            </div>
            <div class="mb-3">
                <label for="idjkendaraan" class="form-label">Jenis</label>
                <select class="form-select" id="idjkendaraan" name="idjkendaraan" required>
                    <option selected disabled value="">Pilih Jenis</option>
                    <?php
                    if (mysqli_num_rows($jkendaraan_result) > 0) {
                        while ($row = mysqli_fetch_assoc($jkendaraan_result)) {
                            echo "<option value='" . $row['idjkendaraan'] . "'>" . $row['jenis'] . "</option>";
                        }
                    } else {
                        echo "<option disabled>Tidak ada data</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input required type="text" class="form-control" id="merk" placeholder="Masukkan Merk" name="merk">
            </div>
            <div class="mt-3 mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input required type="text" class="form-control" id="warna" placeholder="Masukkan Warna" name="warna">
            </div>
            <div class="mb-3">
                <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required>
            </div>
            <div class="mb-3">
                <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" required>
            </div>
            <div class="mb-3">
                <label for="idcustomer" class="form-label">Pemilik</label>
                <select class="form-select" id="idcustomer" name="idcustomer" required>
                    <option selected disabled value="">Pilih Pemilik</option>
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
            <div class="card-footer mt-4">
                <button type="submit" href="#" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=dkendaraan" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>