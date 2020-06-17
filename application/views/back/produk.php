  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

<?= $this->session->flashdata('pesan') ?>

<a href="<?= base_url() ?>produk/tambah" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Produk</a>

<table class="table table-striped mt-3 data">
  <thead>
    <tr>
        <td align="center">No</td>
        <td align="center">Nama Produk</td>
        <td align="center">Kategori</td>
        <td align="center">Harga</td>
        <td align="center">Berat (gram)</td>
        <td align="center">Stok</td>
        <td align="center">Gambar</td>
        <td align="center">Aksi</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($produk as $p):
    ?>
    <tr>
        <td align="center"><?= $no++ ?></td>
        <td><?= $p['nama_produk'] ?></td>
        <td align="center"><?= $p['nama_kategori'] ?></td>
        <td align="center"><?= $p['harga'] ?></td>
        <td align="center"><?= $p['berat'] ?>g</td>
        <td align="center"><?= $p['stok'] ?></td>
        <td align="center"><img src="<?= base_url() ?>assets/img/<?= $p['img'] ?>" alt="gambar" width="25px"></td>
        <td align="center">
            <a href="<?= base_url() ?>produk/ubah/<?= $p['id_kategori'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $p['id_produk'] ?>"><i class="fas fa-trash"></i></button>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


<?php foreach($produk as $pk) : ?>
<!-- Modal -->
<div class="modal fade" id="modalhapus<?= $pk['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin menghapus produk ini ?
        <form action="<?= base_url() ?>produk/hapus" method="post">
            <input type="hidden" name="id" value="<?= $pk['id_produk'] ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>
