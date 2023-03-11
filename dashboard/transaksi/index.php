<?php
include('../connectDB/koneksi.php');
$sql = "SELECT * FROM vwtransaksi";
$result = mysqli_query($conn, $sql);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Transaksi</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?hal=transaksi-create" class="btn btn-sm btn-success">
            <span data-feather="save" class="align-text-bottom"></span>
            Tambah Transaksi
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" width='15'>No</th>
                    <th scope="col">No Nota</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kendaraan</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Metode Bayar</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Catatan</th>
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
                            <th scope="row" class="text-center">
                                <?= $nmr; ?>
                            </th>
                            <td>
                                <?= $row['no_nota']; ?>
                            </td>
                            <td>
                                <?= $row['nama']; ?>
                            </td>
                            <td>
                                <?= $row['jenis']; ?>
                            </td>
                            <td>
                                <?= $row['jenis_layanan']; ?>
                            </td>
                            <td>
                                <?= $row['total_bayar']; ?>
                            </td>
                            <td>
                                <?= $row['metode_bayar']; ?>
                            </td>
                            <td>
                                <?= $row['tgl_transaksi']; ?>
                            </td>
                            <td>
                                <?= $row['catatan']; ?>
                            </td>
                            <td>
                                <div class="btn-group me-2">
                                    <a href="index.php?hal=transaksi-edit&id=<?= $row['idtransaksi']; ?>&nonota=<?= $row['no_nota']; ?>&nama=<?= $row['nama']; ?>&jenis=<?= $row['jenis']; ?>&layanan=<?= $row['jenis_layanan']; ?>&totalbayar=<?= $row['total_bayar']; ?>&metodebayar=<?= $row['metode_bayar']; ?>&tgl=<?= $row['tgl_transaksi']; ?>&catatan=<?= $row['catatan']; ?>"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="(hapus('<?= $row['no_nota']; ?>'))">Hapus</button>

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
    function hapus(data) {
        if (confirm('Apakah anda yakin ingin menghapus data Transaksi = ' + data + '?')) {
            window.location.replace('transaksi/hapus.php?no_nota=' + data)
        }
    }
</script>