  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

<?= $this->session->flashdata('pesan') ?>

<a href="<?= base_url() ?>kategori/tambah" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Kategori</a>

<table class="table table-striped mt-3 data">
  <thead>
    <tr>
        <td align="center">No</td>
        <td align="center">Nama Kategori</td>
        <td align="center">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($kategori as $k):
    ?>
    <tr>
        <td align="center"><?= $no++ ?></td>
        <td><?= $k['nama_kategori'] ?></td>
        <td align="center">
            <a href="<?= base_url() ?>kategori/ubah/<?= $k['id_kategori'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $k['id_kategori'] ?>"><i class="fas fa-trash"></i></button>
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


<?php foreach($kategori as $kg) : ?>
<!-- Modal -->
<div class="modal fade" id="modalhapus<?= $kg['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin menghapus kategori ini ?
        <form action="<?= base_url() ?>kategori/hapus" method="post">
            <input type="hidden" name="id" value="<?= $kg['id_kategori'] ?>">
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
