<form action="user/store.php" method="post">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Tambah User</h5>
            <div class="mt-3 mb-3">
                <label for="username" class="form-label">Username</label>
                <input required type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username">
            </div>
            <div class="mt-3 mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email">
            </div>
            <div class="mt-3 mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
            </div>
            <div class="card-footer mt-4">
                <button type="submit" href="#" class="btn btn-primary">Simpan</button>
                <a href="index.php?hal=user" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
</form>