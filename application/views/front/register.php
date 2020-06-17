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
                <h1 class="h4 text-gray-900 mb-4">Form Register</h1>
              </div>
              <form class="user" action="<?= base_url() ?>auth/register" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nik" placeholder="Masukan No NIK..." required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Masukan Nama..." required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Masukan Email..." required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="toko" placeholder="Masukan Nama Toko..." required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Masukan password..." required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="tlp" placeholder="Masukan No Telpon..." required>
                </div>
                <div class="form-group">
                  <textarea class="form-control form-control-user" name="alamat" id="" cols="30" rows="3" placeholder="Alamat..." required></textarea>
                </div>
               
                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Buat Akun
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
