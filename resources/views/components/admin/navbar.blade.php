
    <!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none  rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <img src="{{ asset('build/assets/img/diogofranco-b.svg') }}" width="50" alt="">
        <div class="sidebar-brand-text mx-3"></div>
    </a>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>

        </li>

    </ul>
    <!-- Nav User Information -->
    <div class="flex-shrink-0  dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user"></i>
          </a>
          <ul class="dropdown-menu text-small shadow" style="left:unset;">
            <li><a class="dropdown-item" href="{{ url('/') }}">Site</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
            <a class="dropdown-item" href="" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Sair
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </a>
            </li>
          </ul>
        </div>
    </nav>
    <!-- End of Topbar -->
