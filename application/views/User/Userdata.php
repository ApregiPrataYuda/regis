<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span><?= $titles?></span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span class="badge badge-secondary"> Home</span></a></li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>




    <div class="container-fluid">
         <div class="card card-primary card-outline col-md-3">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/img/') . $this->session->userdata('image')?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $this->session->userdata('name')?></h3>

                <p class="text-muted text-center"><?= $this->session->userdata('email')?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>email</b> <a class="float-right"><?= $this->session->userdata('email')?></a>
                  </li>
                  <li class="list-group-item">
                    <b>created</b> <a class="float-right"><?= date('d F Y', $this->session->userdata('created')) ?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
              <!-- /.card-body -->
              </div>
              </div>
            <!-- /.card -->

        




