  <!-- Begin Page Content -->
  <div class="container-fluid mt-5">

<!-- Page Heading -->

</div>
<!-- /.container-fluid -->

<div class="container">
    <h2>KERANJANG BELANJA</h2>
    <hr>
    <?= $this->session->flashdata('pesan'); ?>
    <table class="table table-striped table-bordered mt-5">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Berat</th>
            <th scope="col">J-Berat</th>
            <th scope="col">Qty</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>
        </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach( $cart_data as $c ) :
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $c['nama_produk'] ?></td>
        <td><?= number_format($c['harga']) ?></td>
        <td><?= $c['berat'] ?>g</td>
        <td><?= $c['total_berat'] ?>g</td>
        <form action="<?php echo base_url() ?>keranjang/hapus" method="post">
        <td align="center">
            <input type="hidden" class="id_produk" name="produk_id" value="<?=$c['produk_id']; ?>">
			<input type="number" class="qty" data-produk="<?=$c['produk_id']; ?>" name="qty" style="width: 50px" value="<?=$c['total_qty']; ?>">
        </td>
        <td class="total"><?= number_format($c['subtotal']) ?></td>
        <td align="center">
        <button type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </td>
        </form>
    </tr>
    <?php endforeach ?>
  </tbody>
    </table>

    <table class="table table-striped table-bordered mt-5">
        <thead>
            <th>Total Berat</th>
            <td colspan="2" align="right"><?= $total_berat_dan_subtotal['total_berat'] ?>g</td>
        <tr>
            <th>SubTotal</th>
            <td colspan="2" align="right">Rp. <?= number_format($total_berat_dan_subtotal['subtotal']) ?></td>
        </tr>
        </thead>
    </table>

    <?php if( !empty($cart_data) ): ?>

<div class="row">
    <div class="col-sm text-center mt-5">
        <a href="<?= base_url() ?>keranjang/empty_cart/<?= $customer_data['id_trans'] ?>" class="btn btn-danger">Kosongkan Keranjang</a>
        <a href="<?= base_url() ?>" class="btn btn-info">Lanjutkan Belanja</a>
        <a href="<?= base_url() ?>keranjang/checkout/<?= $customer_data['id_trans'] ?>" class="btn btn-success">Kirim Pesanan Ke Admin</a>
    </div>
</div>
    <?php else: ?>
    <h1 class="text-center text-danger mt-5">Tidak ada produk di keranjang</h1>
    <?php endif ?>
</div>
</div>
<!-- End of Main Content -->

<!-- Footer -->

<script>

    $(document).ready(function(){

        $(".qty").change(function(){
            var qty = $(this).val();
            var produk = $(this).data("produk");
            $.ajax({
                type : 'POST',
                url : '<?= base_url() ?>keranjang/update',
                data : 'qty=' + qty + '&produk=' + produk,
                dataType: 'json',
                success: function(data){
                    window.location.reload()
                }

            })
        })



    })

</script>
