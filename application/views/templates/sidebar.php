 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="<?= base_url('admin'); ?>" class="nav-link">Dashboard</a>
         </li>
     </ul>

     <!-- SEARCH FORM -->
     <form class="form-inline ml-3">
         <div class="input-group input-group-sm">
             <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
             <div class="input-group-append">
                 <button class="btn btn-navbar" type="submit">
                     <i class="fas fa-search"></i>
                 </button>
             </div>
         </div>
     </form>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Notifications Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-user"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-item dropdown-header">Halo Admin, <?= $user['name']; ?></span>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item">
                     <i class="fas fa-pencil-alt mr-2"></i> Edit
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                     <i class="fas fa-sign-out-alt mr-2"></i> Logout
                 </a>
             </div>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url(); ?>" class="brand-link" title="Sekolah App">
         <img src="<?= base_url(); ?>assets/img/logo.png" alt="Sekolah App Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Sekolah App</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url() . 'assets/img/' . $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= $user['name']; ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-list"></i>
                         <p>
                             Daftar
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./index.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Mata Pelajaran</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('admin/loadKelas'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kelas</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index3.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Guru</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index3.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Wali Kelas</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('admin/loadSiswa'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Siswa</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index3.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Jadwal</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index3.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pembina</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-clipboard-list"></i>
                         <p>
                             Presensi
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./index.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kelas</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index2.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Ekskul</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-sticky-note"></i>
                         <p>
                             Nilai Siswa
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./index.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kelas</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index2.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Ekskul</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-lightbulb"></i>
                         <p>
                             Usulan Sarana
                         </p>
                     </a>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             Bank Soal
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>