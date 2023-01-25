


 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $titles?></h1>
          </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="alert alert-info alert-dismissible fade show" role="alert" style="background-color:RGB(40, 178, 170);">
                <strong>Wellcome <?= $this->session->userdata('name')?></strong>
                <p class="font-weight-bold">.</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
           </div>
    </section>
        
        <div class="row col-md-8">
        <div class="card card-primary card-outline col-md-4">
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
            <!-- /.card -->
            </div>



      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  