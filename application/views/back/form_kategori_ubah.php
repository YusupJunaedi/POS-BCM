  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ubah Kategori</h1>

<?= $this->session->flashdata('pesan') ?>

<div class="row">
  <div class="col-sm-10">
  
  <div class="card">
  <h5 class="card-header"><i class="fas fa-luggage-cart"></i> Form Ubah Kategori</h5>
  <div class="card-body">
    
  <form action="<?= base_url() ?>kategori/update" method="post">
    
    <div class="form-group">
        <label for="nama">Nama Kategori</label>
        <input type="hidden" name="id" value="<?= $kategori['id_kategori'] ?>">
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $kategori['nama_kategori'] ?>" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success mt-4 mb-5"><i class="fas fa-save"></i> Simpan</button>
    </div>
    
</form>

  </div>
</div>

  </div>


</div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


