<?php
include('../connectDB/koneksi.php');
// query untuk mengambil nilai enum dari kolom jenis pada tabel jenis_kendaraan
$sql_enum = "SELECT COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_NAME = 'jenis_kendaraan' AND COLUMN_NAME = 'jenis'";
$result_enum = mysqli_query($conn, $sql_enum);
$row_enum = mysqli_fetch_assoc($result_enum);
$enum_list = explode(",", str_replace("'", "", substr($row_enum['COLUMN_TYPE'], 5, (strlen($row_enum['COLUMN_TYPE']) - 6))));
?>

<form action="jkendaraan/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Ubah Jenis Kendaraan</h5>
            <div class="mt-3 mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <select class="form-select" id="jenis" name="jenis" required >
                    <!-- <option selected disabled value="<?= $_GET['jenis']; ?>"><?= $_GET['jenis']; ?></option> -->
                    <?php foreach ($enum_list as $item) { ?>
                        <?php if($item == $_GET['jenis']){?>
                        <option value="<?= $item ?>" selected ><?= $item ?></option>
                        <?php } else {?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                        <?php }?>
                    <?php } ?>

                </select>
            </div>
            <div class="mt-3 mb-3">
                <label for="biaya" class="form-label">Biaya</label>
                <input type="number" class="form-control" id="biaya" name="biaya" value="<?= $_GET['biaya']; ?>">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=jkendaraan" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>