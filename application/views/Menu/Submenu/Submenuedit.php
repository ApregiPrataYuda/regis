
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
      <form action="<?= base_url('Menu/processeditsub')?>" method="post">
        <div class="row">

         <!-- <div class="col-md-3 <?= form_error('id') ? '' : null ?>">
            <label for="id"><span> Menu*</span> </label>
            <select name="id" id="id" class="form-control">
                <option value="">-Select-</option>
                <?php foreach ($rows as $key => $value) { ?>
                     <option value="<?= $value->id?>" <?=$value->menu_id == $row->menu_id ? "selected" : null?>><?= $value->menu?></option>
              <?php  } ?>
            </select>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('id') ?></span></small>
          </div> -->


          <div class="col-md-3 <?= form_error('title') ? '' : null ?>">
            <label for="title"><span> Nama Submenu*</span> </label>
            <input type="hidden" name="id" value="<?= $row->id ?>">
            <input type="text" name="title" value="<?= $row->title ?>" class="form-control" placeholder="title submenu....">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('title') ?></span></small>
          </div>

          <div class="col-md-5 <?= form_error('url') ? '' : null ?>">
            <label for="url"><span> url Submenu*</span> </label>
            <input type="text" name="url" value="<?= $row->url ?>" class="form-control" placeholder="url submenu....">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('url') ?></span></small>
          </div>
       </div>

       <div class="row mt-2">
       <div class="col-md-5 <?= form_error('icon') ? '' : null ?>">
            <label for="icon"><span> icon Submenu*</span> </label>
            <input type="text" name="icon" value="<?= $row->icon ?>" class="form-control" placeholder="icon submenu....">
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('icon') ?></span></small>
         </div>

         <div class="col-md-3 <?= form_error('is_active') ? '' : null ?>">
            <label for="is_active"><span> Status*</span> </label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="">-Select-</option>
                <?= $is_active = $this->input->post('is_active') ?  $this->input->post('is_active') : $row->is_active ?>
                <option value="1" <?= $is_active == 1 ? "selected" : null ?>>Aktif</option>
                <option value="0" <?= $is_active == 0 ? "selected" : null ?>>NonAktif</option>
            </select>
            <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('is_active') ?></span></small>
          </div>
       </div>
        <div class="row ml-auto mb-3 mr-5 mt-3">
          <button type="submit" name="edit" class="btn btn-outline-secondary btn-sm ml-2"> <i class="fa fa-save"></i> Simpan</button>
          <button type="Reset" class="btn btn-outline-warning btn-sm ml-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>
