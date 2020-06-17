  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Pesanan</h1>

<?= $this->session->flashdata('pesan') ?>


<table class="table table-striped mt-3 data">
  <thead>
    <tr>
        <td align="center">No</td>
        <td>Nama Pemesan</td>
        <td align="center">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($penjualan_data as $p):
    ?>
    <tr>
        <td align="center"><?= $no++ ?></td>
        <td><?= $p['nama'] ?></td>
        <td align="center">
            <a href="<?= base_url() ?>data_pesanan/view/<?= $p['id_trans'] ?>" class="btn btn-info"><i class="fas fa-search-plus"></i></a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $p['id_trans'] ?>"><i class="fas fa-trash"></i></button>
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


<!-- <?php foreach($penjualan_data as $pd) : ?>
<!-- Modal -->
<div class="modal fade" id="modalhapus<?= $pd['id_trans'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin menghapus pesanan ini ?
        <form action="<?= base_url() ?>data_pesanan/dell/<?= $pd['id_trans'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $pd['id_trans'] ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?> -->
