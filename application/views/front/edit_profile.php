<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Data Profile</h1>
              </div>
              <form class="user" action="<?= base_url() ?>profile/ubah" method="post">
              <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nik" value="<?= $user['nik'] ?>" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" value="<?= $user['nama'] ?>" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" value="<?= $user['email'] ?>" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="toko" value="<?= $user['nama_toko'] ?>" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Masukan password jika ingin diubah">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="tlp" value="<?= $user['no_tlp'] ?>" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control form-control-user" name="alamat" id="" cols="30" rows="3" placeholder="Alamat..." required><?= $user['alamat'] ?></textarea>
                </div>
               
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Ubah Data Profile
                </button>
               
              </form>
              <hr>
            
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</div>
