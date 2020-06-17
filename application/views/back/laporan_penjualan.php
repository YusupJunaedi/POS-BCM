<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<!-- Content Row -->
<div class="row">

  <!-- Grow In Utility -->
  <div class="col-lg-10 mt-5">

  <?= $this->session->flashdata('berhasil') ?>

    <div class="card position-relative">
      <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="m-0 font-weight-bold text-primary">Data Penjualan</h3>
            </div>
            <div class="col-sm-4">
                <a href="<?= base_url() ?>laporan/penjualanPDF" class="btn btn-primary ml-auto">Download</a>
            </div>
        </div>
      </div>
      <div class="card-body">
        
        <table class="table table-striped mt-3">
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



    </div>

  </div>
</div>
</div>
</div>
</div>