    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Akademik</div>
      </a>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Akademik
      </div>

      <li class="nav-item" id="home">
        <a class="nav-link" href="<?= base_url()?>home">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>
      
      <li class="nav-item" id="kelas">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropone" aria-expanded="true" aria-controls="dropone">
          <i class="fas fa-fw fa-building"></i>
          <span>Kelas</span>
        </a>
        <div id="dropone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <h6 class="collapse-header text-light">Kelas</h6>
            <a class="collapse-item text-light" href="<?= base_url()?>kelas/reguler">Reguler</a>
            <a class="collapse-item text-light" href="<?= base_url()?>kelas/pvkhusus">Pv Khusus</a>
            <a class="collapse-item text-light" href="<?= base_url()?>kelas/pvluar">Pv Luar</a>
            <a class="collapse-item text-light" href="#modalTambahKelasReguler" data-toggle="modal">Tambah Kelas Reguler</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item" id="peserta">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#droptwo" aria-expanded="true" aria-controls="droptwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Peserta</span>
        </a>
        <div id="droptwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <h6 class="collapse-header text-light">Peserta</h6>
            <a class="collapse-item text-light" href="<?= base_url()?>peserta/reguler">Reguler</a>
            <a class="collapse-item text-light" href="<?= base_url()?>peserta/pvkhusus">Pv Khusus</a>
            <a class="collapse-item text-light" href="<?= base_url()?>peserta/pvluar">Pv Luar</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item" id="badal">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropsix" aria-expanded="true" aria-controls="dropsix">
          <i class="fas fa-fw fa-list"></i>
          <span>Badal</span>
        </a>
        <div id="dropsix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <h6 class="collapse-header text-light">Badal</h6>
            <a class="collapse-item text-light" href="<?= base_url()?>badal/jadwal">Jadwal</a>
            <a class="collapse-item text-light" href="<?= base_url()?>badal/konfirmasi">Konfirmasi</a>
            <a class="collapse-item text-light" href="<?= base_url()?>badal/rekap">Rekap</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item" id="wl">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropthree" aria-expanded="true" aria-controls="dropthree">
          <i class="fas fa-fw fa-list"></i>
          <span>Waiting List</span>
        </a>
        <div id="dropthree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <h6 class="collapse-header text-light">Waiting List</h6>
            <a class="collapse-item text-light" href="<?= base_url()?>wl/privat">Privat</a>
            <a class="collapse-item text-light" href="<?= base_url()?>wl/reguler">Reguler</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item" id="laporan">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropfour" aria-expanded="true" aria-controls="dropfour">
          <i class="fas fa-fw fa-flag"></i>
          <span>Laporan</span>
        </a>
        <div id="dropfour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <h6 class="collapse-header text-light">Laporan</h6>
            <a class="collapse-item text-light" href="<?= base_url()?>laporan/rekap">Rekap KBM</a>
            <a class="collapse-item text-light" href="<?= base_url()?>laporan/">Download Laporan</a>
          </div>
        </div>
      </li>
      
      <!-- Nav Item - Pengajar -->
      <li class="nav-item" id="kesediaan">
        <a class="nav-link" href="<?= base_url()?>laporan/kesediaan">
          <i class="fas fa-bicycle"></i>
          <span>kesediaan</span></a>
      </li>
      
      <li class="nav-item" id="lainnya">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropfive" aria-expanded="true" aria-controls="dropfive">
          <i class="fas fa-fw fa-ellipsis-h"></i>
          <span>Lainnya</span>
        </a>
        <div id="dropfive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <h6 class="collapse-header text-light">Lainnya</h6>
            <a class="collapse-item text-light" href="<?= base_url()?>other/program">Program</a>
            <a class="collapse-item text-light" href="#modalAddProgram" data-toggle="modal">Tambah Program</a>
          </div>
        </div>
      </li>

      <li class="nav-item" id="tambahPiutang">
        <a class="nav-link" href="<?= base_url()?>login/logout" onclick="return confirm('Yakin akan keluar?')">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>keluar</span></a>
      </li>
    </ul>
    <!-- End of Sidebar -->