  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Produk</h1>


  <div class="row">
  <?php foreach($produk as $p) : ?>
  <div class="col-md-3 mt-4">
    <div class="card">
    <img src="<?= base_url() ?>assets/img/<?= $p['img'] ?>" class="card-img-top" alt="gambar" height=300px">
      <div class="card-body text-center">
        <h5 class="card-title"><b><?= $p['nama_produk'] ?></b></h5>
        <p class="card-text badge badge-danger">Rp. <?=  number_format($p['harga'], 0, ".", ".") ?></p>
        <p class="card-text badge badge-warning">Stok <?= $p['stok'] ?></p>
        <div class="text-center">
            <a href="<?= base_url() ?>keranjang/beli/<?= $p['id_produk'] ?>" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Beli</a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
  
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
