<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Register</b>-Page</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register </p>

      <form action="<?= site_url('Auth/registration')?>" method="post">

      <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?=form_error('name')?></span></small>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="<?= set_value('name')?>" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?=form_error('email')?></span></small>
        <div class="input-group mb-3  <?=form_error('email') ? 'has-error' : null?>">
          <input type="text" class="form-control" name="email" value="<?= set_value('email')?>" placeholder="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?=form_error('password')?></span></small>
        <div class="input-group mb-3 <?=form_error('password') ? 'has-error' : null?>">
          <input type="password" class="form-control" name="password" value="<?= set_value('password')?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?=form_error('passconf')?></span></small>
        <div class="input-group mb-3 <?=form_error('passconf') ? 'has-error' : null?>">
          <input type="password" class="form-control" name="passconf" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="<?= site_url('Auth/index')?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->