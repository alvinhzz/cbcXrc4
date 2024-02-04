<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index.php" class="brand-link logo-switch">
  <img src="assets/img/logo-informatika.png" alt="AdminLTE Docs Logo Large" class="brand-image-xl logo-xl" style="left: 68px">
</a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
      <nav class="m-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <div>
            <li class="nav-item" role="presentation">
                <a href="index.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="index.php") { echo "active"; }else{echo "";}?>">
                    <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
          </div>

          <div>
            <li class="nav-item" role="presentation">
                <a href="panduan.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="panduan.php") { echo "active"; }else{echo "";}?>">
                    <i class="nav-icon fas fa-book"></i>
                <p>
                  Panduan Penggunaan
                </p>
              </a>
            </li>
          </div>

          <div>
            <li class="nav-item" role="presentation">
                <a href="v_enkripsi.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="v_enkripsi.php") { echo "active"; }else{echo "";}?>">
                    <i class="nav-icon fas fa-lock"></i>
                <p>
                  Enkripsi
                </p>
              </a>
            </li>
            <li class="nav-item" role="presentation">
                  <a href="v_dekripsi.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="v_dekripsi.php") { echo "active"; }else{echo "";}?>">
                <i class="nav-icon fas fa-unlock"></i>
                <p>
                  Dekripsi
                </p>
              </a>
            </li>
          </div>      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>