<?php
include('../connectDB/koneksi.php');
$sql = "SELECT * FROM vwkendaraan";
$result = mysqli_query($conn, $sql);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kendaraan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?hal=dkendaraan-create" class="btn btn-sm btn-success">
        <span data-feather="save" class="align-text-bottom"></span>
            Tambah kendaraan
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" width='15'>No</th>
                    <th scope="col">Plat Nomor</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Tanggal Keluar</th>
                    <th scope="col">Pemilik</th>
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
                                <?= $row['plat_nomor']; ?>
                            </td>
                            <td>
                                <?= $row['jenis']; ?>
                            </td> 
                            <td>
                                <?= $row['merk']; ?>
                            </td>
                            <td>
                                <?= $row['warna']; ?>
                            </td>
                            <td>
                                <?= $row['tgl_masuk']; ?>
                            </td>
                            <td>
                                <?= $row['tgl_keluar']; ?>
                            </td>
                            <td>
                                <?= $row['nama']; ?>
                            </td>
                            <td>
                                <div class="btn-group me-2">
                                    <a href="index.php?hal=dkendaraan-edit&id=<?= $row['idkendaraan']; ?>&plat=<?= $row['plat_nomor']; ?>&jenis=<?= $row['jenis']; ?>&merk=<?= $row['merk']; ?>&warna=<?= $row['warna']; ?>&tglmasuk=<?= $row['tgl_masuk']; ?>&tglkeluar=<?= $row['tgl_keluar']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger" onclick="(hapus('<?= $row['plat_nomor']; ?>'))">Hapus</button>

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
            window.location.replace('dkendaraan/hapus.php?plat_nomor=' + data)
        }
    }
</script>