  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->

</div>
<!-- /.container-fluid -->

<div class="container mt-5">
    <h2>PROFIL SAYA</h2>
    <hr>

    <div class="row">
        <div class="col-sm-12"><?= $this->session->flashdata('pesan'); ?></div>
        <div class="col-sm-6">
            <div class="card border-primary mb-3">
                <div class="card-header"><h4>NIK :</h4></div>
                <div class="card-body text-primary text-center">
                    <h5 class="card-title"><?= $user['nik'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-primary mb-3">
                <div class="card-header"><h4>Nama :</h4></div>
                <div class="card-body text-primary text-center">
                    <h5 class="card-title"><?= $user['nama'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-primary mb-3">
                <div class="card-header"><h4>No. Telpon :</h4></div>
                <div class="card-body text-primary text-center">
                    <h5 class="card-title"><?= $user['no_tlp'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-primary mb-3">
                <div class="card-header"><h4>Email :</h4></div>
                <div class="card-body text-primary text-center">
                    <h5 class="card-title"><?= $user['email'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-primary mb-3">
                <div class="card-header"><h4>Nama Toko :</h4></div>
                <div class="card-body text-primary text-center">
                    <h5 class="card-title"><?= $user['nama_toko'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card border-primary mb-3">
                <div class="card-header"><h4>Alamat :</h4></div>
                <div class="card-body text-primary text-center">
                    <h5 class="card-title"><?= $user['alamat'] ?></h5>
                </div>
            </div>
        </div>
    </div>


</div>

</div>
<!-- End of Main Content -->

<!-- Footer -->
