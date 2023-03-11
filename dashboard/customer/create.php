<form action="customer/store.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Tambah Customer</h5>
            <div class="mt-3 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input required type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
            </div>
            <div class="mt-3 mb-3">
                <label for="notelp" class="form-label">No Telepon</label>
                <input required type="tel" class="form-control" id="notelp" placeholder="Masukkan No Telepon" name="notelp">
            </div>
            <div class="mt-3 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input required type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" href="#" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=customer" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>