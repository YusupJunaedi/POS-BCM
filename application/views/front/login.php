 <div class="container">
<div class="text-center">
    <?= $this->session->flashdata('pesan') ?>
</div>
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
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form class="user"action="<?= base_url() ?>auth" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Email...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                   
                  </form>
                  <hr>
                 
                  <div class="text-center mb-3">
                    <h5><a class="small" href="<?= base_url() ?>auth/daftar">Buat Akun!</a></h5>
                  </div>
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
