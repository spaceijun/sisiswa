<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu"></div>
        @php
            $current_url = Request::path();
            $role = Auth::user()->role; // Mengambil role user yang login
        @endphp
        <ul class="navbar-nav" id="navbar-nav">
            @if ($role == 'Superadmin')
                {{-- Menu Khusus Super Admin --}}
                <li class="nav-item">
                    <a href="{{ url('superadmin/dashboard') }}"
                        class="nav-link {{ $current_url == 'superadmin/dashboard' ? 'active' : '' }}">
                        <i data-feather="home"></i>Dashboard
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Data Master</span></li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/siswas') }}"
                        class="nav-link {{ $current_url == 'superadmin/siswas' ? 'active' : '' }}">
                        <i data-feather="home"></i>Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/gurus') }}"
                        class="nav-link {{ $current_url == 'superadmin/gurus' ? 'active' : '' }}">
                        <i data-feather="home"></i>Guru
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Data Kelas</span></li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/kelas-categories') }}"
                        class="nav-link {{ $current_url == 'superadmin/kelas-categories' ? 'active' : '' }}">
                        <i data-feather="home"></i>Jurusan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/kelas') }}"
                        class="nav-link {{ $current_url == 'superadmin/kelas' ? 'active' : '' }}">
                        <i data-feather="home"></i>Kelas
                    </a>
                </li>


                <li class="menu-title"><span data-key="t-menu">Pengaturan Menu</span></li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/settings') }}"
                        class="nav-link {{ $current_url == 'superadmin/settings' ? 'active' : '' }}">
                        <i data-feather="settings"></i>Settings Website
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('superadmin/users') }}"
                        class="nav-link {{ $current_url == 'superadmin/users' ? 'active' : '' }}">
                        <i data-feather="users"></i>Manajemen Pengguna
                    </a>
                </li>
            @elseif($role == 'Guru')
                {{-- Menu Khusus User --}}
                <li class="nav-item">
                    <a href="{{ url('guru/dashboard') }}"
                        class="nav-link {{ $current_url == 'guru/dashboard' ? 'active' : '' }}">
                        <i data-feather="home"></i>Beranda
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">Menu Utama</span></li>
                <li class="nav-item">
                    <a href="{{ url('guru/siswas') }}"
                        class="nav-link {{ $current_url == 'guru/siswas' ? 'active' : '' }}">
                        <i data-feather="guru"></i>Data Siswa
                    </a>
                </li>
            @elseif($role == 'Siswa')
                {{-- Menu Khusus User --}}
                <li class="nav-item">
                    <a href="{{ url('siswa/dashboard') }}"
                        class="nav-link {{ $current_url == 'siswa/dashboard' ? 'active' : '' }}">
                        <i data-feather="home"></i>Beranda
                    </a>
                </li>
                {{-- <li class="menu-title"><span data-key="t-menu">Menu Utama</span></li>
                <li class="nav-item">
                    <a href="{{ url('siswa/mata-pelajarans') }}"
                        class="nav-link {{ $current_url == 'siswa/mata-pelajarans' ? 'active' : '' }}">
                        <i data-feather="home"></i>Mata Pelajaran
                    </a>
                </li> --}}
            @endif

            {{-- Menu yang tersedia untuk semua role --}}
            {{-- <li class="menu-title"><span data-key="t-menu">Umum</span></li>
          <li class="nav-item">
              <a href="{{ url('help') }}"
                  class="nav-link {{ $current_url == 'help' ? 'active' : '' }}">
                  <i data-feather="help-circle"></i>Bantuan
              </a>
          </li> --}}
        </ul>
    </div>
    <!-- Sidebar -->
</div>
