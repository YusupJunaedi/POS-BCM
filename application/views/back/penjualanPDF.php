<center>
    <h2>Laporan Penjualan</h2>
</center>
<br><br>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Pembeli</th>
        <th>Produk</th>
        <th>Qty</th>
        <th>harga</th>
        <th>Tanggal Pembelian</th>
    </tr>
    <?php 
    $no = 1;
    foreach($laporan as $l) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $l['nama'] ?></td>
        <td><?= $l['nama_produk'] ?></td>
        <td><?= $l['qty'] ?></td>
        <td><?= $l['harga_total'] ?></td>
        <td><?= $l['tgl'] ?></td>
    </tr>
    <?php endforeach ?>
</table>


