<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        {{-- <img src="{{ asset('/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
      </div>
      <div class="info">
        @auth   
        <a href="#" class="d-block">Welcome, {{ Auth::user()->name }}</a>
        @endauth
        @guest
            <a href="" class="d-block">Anda belum login</a>
        @endguest
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-home pr-3"></i>
            <p>
            Dashboard
            </p>
        </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list pr-3"></i>
            <p>
              Halaman
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('table') }}" class="nav-link">
                <i class="nav-icon fas fa-window-minimize pr-3"></i>
                <p>Table</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('data-table') }}" class="nav-link">
                <i class="nav-icon fas fa-window-minimize pr-3"></i>
                <p>Data Table</p>
              </a>
            </li>
          </ul>

          <li class="nav-item">
            <a href="{{ route('category') }}" class="nav-link">
                <i class="nav-icon fas fa-folder-open pr-3"></i>
                <p>
                Kategori
                </p>
            </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('game') }}" class="nav-link">
              <i class="nav-icon fas fa-gamepad pr-3"></i>
              <p>
              Game
              </p>
          </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('books.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book pr-3"></i>
            <p>
            Books
            </p>
        </a>
    </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>