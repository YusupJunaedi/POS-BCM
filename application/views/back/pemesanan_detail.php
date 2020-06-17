<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<!-- Content Row -->
<div class="row">

  <!-- Grow In Utility -->
  <div class="col-lg-12 mt-5">

    <div class="card position-relative">
      <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Data Pesanan</h3>
      </div>
      <div class="card-body">
        
        <div class="row">
            <div class="col-sm-12">
                <h6>Pemesan</h6>
                <strong><?= $customer_data['nama'] ?></strong><br>
                <?= $customer_data['alamat'] ?>. 
                <strong>No Hp : <?= $customer_data['no_tlp'] ?></strong>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped mt-3">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total Berat(gram)</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    <?php
                        $no = 1;
                        foreach ( $cart_data as $c ) :
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $no++ ?></td>
                        <td style="text-align:left"><?php echo $c['nama_produk'] ?></td>
                        <td style="text-align:left"><?php echo $c['harga'] ?></td>
                        <td style="text-align:left"><?php echo $c['berat'] ?>g</td>
                        <td style="text-align:left"><?php echo $c['total_berat'] ?>g</td>
                        <td style="text-align:left"><?php echo $c['total_qty'] ?></td>
                        <td style="text-align:left"><?php echo number_format($c['subtotal']) ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped mt-3">
                    <tr>
                        <th>Total Berat</th>
                        <td colspan="2" align="right"><?php echo $total_berat_dan_subtotal['total_berat'];?> (gram)
                        </td>
                        </tr>
                        <tr>
                        <th>SubTotal</th>
                        <td></td>
                        <td align="right">Rp. <?php echo number_format($total_berat_dan_subtotal['subtotal']) ?></td>
                        </tr>
                    
                </table>
            </div>

            <div class="col-sm-12">
                <form action="<?= base_url() ?>data_pesanan/laporan/<?= $cart_data[0]['trans_id'] ?>" method="post">
                <?php foreach ( $cart_data as $cd ) :?>
                    <input type="hidden" name="id_produk<?= $cd['produk_id'] ?>" value="<?= $cd['produk_id'] ?>">
                <?php endforeach ?>
            </div>

            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-info">Kirim Pesanan</button>
                </form>
                <a href="<?= base_url() ?>data_pesanan/dell/<?= $cart_data[0]['trans_id'] ?>" class="btn btn-danger">Hapus Pesanan</a>
            </div>
            

        </div>



    </div>

  </div>
</div>