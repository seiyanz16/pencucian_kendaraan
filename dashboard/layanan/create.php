<form action="layanan/store.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Tambah Layanan</h5>
            <div class="mt-3 mb-3">
                <label for="jenis" class="form-label">Jenis Layanan</label>
                <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="mt-3 mb-3">
                <label for="biaya" class="form-label">Biaya</label>
                <input type="number" class="form-control" id="biaya" name="biaya">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" href="#" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=customer" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>