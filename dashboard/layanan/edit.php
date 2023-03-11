<form action="layanan/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Ubah Jenis Kendaraan</h5>
            <div class="mt-3 mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $_GET['jenis']; ?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="biaya" class="form-label">Biaya</label>
                <input type="number" class="form-control" id="biaya" name="biaya" value="<?= $_GET['biaya']; ?>">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=layanan" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>