    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('aset/img/logofooter1.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Website | MR</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.berita.index') }}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita Terkini
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.testimoni.index') }}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Testimoni
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.kerjasama.index') }}" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Kerjasama
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.kurikulum.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kurikulum
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.strukturdosen.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Struktur Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.dosen.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ Route('admin.staf.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Staf
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Fasilitas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('admin.ruang.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri Fasilitas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deskripsi Fasilitas</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="{{ Route('admin.profillulusan.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Profil Lulusan
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ Route('admin.meta.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-trophy"></i>
                  <p>
                    Meta Profile
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ Route('admin.himamera.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Kegiatan Mahasiswa
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ Route('admin.prestasi.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-medal"></i>
                  <p>
                    Prestasi Mahasiswa
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ Route('admin.mrclub.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-running"></i>
                  <p>
                    MR Club
                  </p>
                </a>
            </li>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>