<form action="customer/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Ubah Customer</h5>
            <div class="mt-3 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['nama']; ?>" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
            </div>
            <div class="mt-3 mb-3">
                <label for="notelp" class="form-label">No Telepon</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['notelp']; ?>" type="tel" class="form-control" id="notelp" placeholder="Masukkan notelp" name="notelp">
            </div>
            <div class="mt-3 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <textarea required class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat"><?= $_GET['alamat']; ?></textarea>
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=customer" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>