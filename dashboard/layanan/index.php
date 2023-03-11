<?php
include('../connectDB/koneksi.php');
$sql = "SELECT * FROM layanan";
$result = mysqli_query($conn, $sql);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Jenis Layanan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?hal=layanan-create" class="btn btn-sm btn-success">
        <span data-feather="save" class="align-text-bottom"></span>
            Tambah Layanan
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" width='15'>No</th>
                    <th scope="col">Jenis Layanan</th>
                    <th scope="col">Biaya</th>
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
                                <?= $row['jenis_layanan']; ?>
                            </td> 
                            <td>
                                <?= $row['biaya']; ?>
                            </td>
                            <td>
                                <div class="btn-group me-2">
                                    <a href="index.php?hal=layanan-edit&id=<?= $row['idlayanan']; ?>&jenis=<?= $row['jenis_layanan']; ?>&biaya=<?= $row['biaya']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger" onclick="(hapus('<?= $row['jenis_layanan']; ?>'))">Delete</button>

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
        if(confirm('Apakah anda yakin ingin menghapus data Jenis Layanan = ' + data + '?')){
            window.location.replace('layanan/hapus.php?jenis=' + data)
        }
    }
</script>