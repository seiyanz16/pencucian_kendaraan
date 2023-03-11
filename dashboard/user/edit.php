<form action="user/ubah.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Ubah User</h5>
            <div class="mt-3 mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['user']; ?>" type="text" class="form-control" id="username" placeholder="Masukkan username" name="username">
            </div>
            <div class="mt-3 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['email']; ?>" type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email">
            </div>
            <div class="mt-3 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <input required value="<?= $_GET['password']; ?>" type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=anggaran" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>