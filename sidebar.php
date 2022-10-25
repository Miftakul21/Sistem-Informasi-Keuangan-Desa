  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-chart-pie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bumdes</div>
      </a>
      
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi-desa" aria-expanded="true" aria-controls="transaksi-desa">
          <i class="fas fa-building"></i>
          <span>Transaksi Desa</span>
        </a>
        <div id="transaksi-desa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi Desa</h6>
            <a class="collapse-item" href="kas.php">Keuangan Desa</a>
            <a class="collapse-item" href="kategori.php">Kategori Desa</a>
            <a class="collapse-item" href="laporan_keuangan_desa.php">Laporan Keuangan Desa</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi-pinjaman" aria-expanded="true" aria-controls="transaksi-pinjaman">
          <i class="fas fa-hand-holding-usd"></i>
          <span>Transaksi Pinjaman</span>
        </a>
        <div id="transaksi-pinjaman" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="pinjaman.php">Keuangan Pinjaman</a>
            <a class="collapse-item" href="laporan_keuangan_pinjaman.php">Laporan Keuangan Desa</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="karyawan.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Karyawan</span>
        </a>
      </li>
      
      <!-- sidebar button  -->
      <div class="text-center d-none d-md-inline" style="margin-top: 10rem;">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
