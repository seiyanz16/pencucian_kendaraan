<?php 
include('../connectDB/koneksi.php');
$customer = "SELECT * FROM customer";
$jkendaraan = "SELECT * FROM jenis_kendaraan";
$layanan = "SELECT * FROM layanan";
$customer_result = mysqli_query($conn, $customer);
$jkendaraan_result = mysqli_query($conn, $jkendaraan);
$layanan_result = mysqli_query($conn, $layanan);

// query untuk mengambil nilai enum dari kolom jenis pada tabel jenis_kendaraan
$sql_enum = "SELECT COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_NAME = 'transaksi' AND COLUMN_NAME = 'metode_bayar'";
$result_enum = mysqli_query($conn, $sql_enum);
$row_enum = mysqli_fetch_assoc($result_enum);
$enum_list = explode(",", str_replace("'", "", substr($row_enum['COLUMN_TYPE'], 5, (strlen($row_enum['COLUMN_TYPE']) - 6))));
?>
<form action="transaksi/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Edit Data Transaksi</h5>
            <div class="mt-3 mb-3">
                <label for="no_nota" class="form-label">No Nota</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required type="text" class="form-control" id="no_nota" placeholder="Masukkan Nomor Nota" name="no_nota" value="<?= $_GET['nonota']; ?>">
            </div>
            <div class="mt-3 mb-3">
            <div class="mb-3">
                <label for="idcustomer" class="form-label">Nama</label>
                <select class="form-select" id="idcustomer" name="idcustomer" required>
                    <option selected disabled value="<?= $_GET['nama']; ?>"><?= $_GET['nama']; ?></option>
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
                <label for="idjkendaraan" class="form-label">Jenis Kendaraan</label>
                <select class="form-select" id="idjkendaraan" name="idjkendaraan" required>
                    <option selected disabled value="<?= $_GET['jenis']; ?>"><?= $_GET['jenis']; ?></option>
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
            <div class="mb-3">
                <label for="idlayanan" class="form-label">Jenis Layanan</label>
                <select class="form-select" id="idlayanan" name="idlayanan" required>
                    <option selected disabled value="<?= $_GET['layanan']; ?>"><?= $_GET['layanan']; ?></option>
                    <?php
                    if (mysqli_num_rows($layanan_result) > 0) {
                        while ($row = mysqli_fetch_assoc($layanan_result)) {
                            echo "<option value='" . $row['idlayanan'] . "'>" . $row['jenis_layanan'] . "</option>";
                        }
                    } else {
                        echo "<option disabled>Tidak ada data</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <label for="totalbayar" class="form-label">Total Bayar</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input type="text" class="form-control" id="totalbayar" readonly name="totalbayar" placeholder="Rp. - (readonly)," value="<?= $_GET['totalbayar']; ?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="metodebayar" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="metodebayar" name="metodebayar" required>
                    <option selected disabled value="<?= $_GET['metodebayar']; ?>"><?= $_GET['metodebayar']; ?> </option>
                    <?php foreach ($enum_list as $item) { ?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal Transaksi</label>
                <input type="date" class="form-control" id="tgl" name="tgl" required value="<?= $_GET['tgl']; ?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <input required type="text" class="form-control" id="catatan" placeholder="Masukkan Catatan" name="catatan" value="<?= $_GET['catatan']; ?>">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" href="#" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=transaksi" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>