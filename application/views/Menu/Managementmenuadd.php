
<section class="content-header ml-4">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
        <!-- <h3><span><?= $titles?></span></h3> -->
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-secondary" href="<?= site_url('Form_leave_data') ?>"> <u>Kembali</u>  </a></li>
          <!-- <li class="breadcrumb-item"><span class="badge badge-secondary">Management User Form Tambah</span></a></li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content  col-md-12">

  <!-- general form elements disabled -->
  <div class="card card-secondary">
    <div class="card-header" style="background-color:RGB(40, 178, 170);">
      <h3 class="card-title"><?= $titles?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="" method="post">
        <div class="row">

          <div class="col-md-5 <?= form_error('menu') ? '' : null ?>">
            <label for="menu"><span> Menu*</span> </label>
            <input type="text" name="menu" value="<?= set_value('menu'); ?>" class="form-control" placeholder="menu Aplikasi....">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('menu') ?></span></small>
          </div>

       </div>
        <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" name="add" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>
