 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="assets/backend/index3.html" class="brand-link">
      <img src="assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/') . $this->session->userdata('image')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('name')?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Main </li>
        <li class="nav-item Active">
            <a style="color: RGB(245, 245, 245);" href="<?= site_url('Dashboard') ?>" class="nav-link">
            <i class="nav-icon  fas fa-chart-line"></i>
            <p style="color: RGB(245, 245, 245);">
                Dashboard
            </p>
            </a>
        </li>

        <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Menus </li>
        <li class="nav-item Active">
            <a style="color: RGB(245, 245, 245);" href="<?= site_url('user_page') ?>" class="nav-link">
            <i class="nav-icon  fas fa-users"></i>
            <p style="color: RGB(245, 245, 245);">
                user
            </p>
            </a>
        </li>


        <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">out </li>
        <li class="nav-item Active">
            <a style="color: RGB(245, 245, 245);" href="<?= site_url('Auth/logout') ?>" class="nav-link">
            <i class="nav-icon  fas fa-upload"></i>
            <p style="color: RGB(245, 245, 245);">
                Logout
            </p>
            </a>
        </li>
         
    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>