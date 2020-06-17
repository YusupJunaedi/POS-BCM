  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Ubah Produk</h1>

<?= $this->session->flashdata('pesan') ?>

<div class="row">
  <div class="col-sm-10">
  
  <div class="card">
  <h5 class="card-header"><i class="fas fa-luggage-cart"></i> Form Ubah Produk</h5>
  <div class="card-body">
    
  <form action="<?= base_url() ?>produk/update" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $produk['id_produk'] ?>">
    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk['nama_produk'] ?>" required>
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select class="form-control" id="kategori" name="kategori" required>
            <option>- Pilih Kategori -</option>
            <?php foreach($kategori as $k) : ?>
            <option value="<?= $k['id_kategori'] ?>" <?php if($k['id_kategori'] == $produk['id_kategori']){ echo 'selected'; }  ?>><?= $k['nama_kategori'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga" value="<?= $produk['harga'] ?>" required>
    </div>
    <div class="form-group">
        <label for="berat">Berat</label>
        <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukan berat" value="<?= $produk['berat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukan stok" value="<?= $produk['stok'] ?>" required>
    </div>
    <div class="form-group">
        <label for="img">Gambar</label><br>
        <input type="file" class="btn btn-info " id="img" name="img" placeholder="Masukan Gambar" value="<?= $produk['img'] ?>" ><br>
        <small class="text text-primary ">Kosongkan jika gambar tidak ingin di ubah.</small>
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


<script>
    $(document).ready(function(){

$("#kategori").change(function(){
    var id = $(this).val();
    $.ajax({
        type : 'POST',
        url : '<?= base_url() ?>produk/getSuplier',
        data : 'id=' +id,
        dataType: 'json',
        success: function(data){
            console.log(data[0].nama_suplier);
            var output = '';
            var i;
            for(i=0; i<data.length; i++){
                output += `<option value="`+data[i].id_suplier+`">`+data[i].nama_suplier+`</option>`;
            }
            output1 = `<option>- Pilih Suplier -</option>`;
            $("#suplier").html(output1 + output);
        }
    })
})


})
</script>
