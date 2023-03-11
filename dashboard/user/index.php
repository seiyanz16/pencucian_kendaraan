<?php
include('../connectDB/koneksi.php');
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?hal=user-create" class="btn btn-sm btn-success">
        <span data-feather="save" class="align-text-bottom"></span>
            Tambah User
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" width='15'>No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $nmr = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <th scope="row" class="text-center"><?= $nmr; ?></th>
                            <td>
                                <?= $row['username']; ?>
                            </td> 
                            <td>
                                <?= $row['email']; ?>
                            </td>
                            <td>
                                <div class="btn-group me-2">
                                    <a href="index.php?hal=user-edit&id=<?= $row['iduser']; ?>&user=<?= $row['username']; ?>&email=<?= $row['email']; ?>&password=<?= $row['password']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger" onclick="(hapus('<?= $row['username']; ?>'))">Hapus</button>

                                </div>
                            </td>
                </tr>
                <?php
                        $nmr++;
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conn);
                    ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function hapus(data){
        if(confirm('Apakah anda yakin ingin menghapus data User = ' + data + '?')){
            window.location.replace('user/hapus.php?username=' + data)
        }
    }
</script>