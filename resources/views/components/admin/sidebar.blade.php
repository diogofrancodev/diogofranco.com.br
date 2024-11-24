<!-- Sidebar -->
<ul class="navbar-nav sidebar accordion d-print-none" id="accordionSidebar">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/') }}">
            <i class="fa-sharp fa-solid fa-chart-pie"></i>
            <span>Painel</span>
        </a>
    </li>


    @if (auth()->user()->hasRole('Administrador'))
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- CADASTROS -->
    <div class="sidebar-heading">
        Geral
    </div>
    <!-- Nav Item - Paciente -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Config</span>
            {{-- <i class="fa-brands fa-dev position-absolute bottom-0 icon-dev"></i> --}}
        </a>
    </li>
    @endif

    @if (auth()->user()->hasRole('Administrador'))
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Blog
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/post_categorias') }}">
            <i class="fas fa-fw fa-rss"></i>
            <span>Categorias Post</span>
            {{-- <i class="fa-brands fa-dev position-absolute bottom-0 icon-dev"></i> --}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/posts') }}">
            <i class="fas fa-fw fa-rss"></i>
            <span>Posts</span>
            {{-- <i class="fa-brands fa-dev position-absolute bottom-0 icon-dev"></i> --}}
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        DevPing
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/devpings') }}">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Pings</span>
            {{-- <i class="fa-brands fa-dev position-absolute bottom-0 icon-dev"></i> --}}
        </a>
    </li>
    @endif
    @if (auth()->user()->hasRole('Desenvolvedor'))
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Dev
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/pulse') }}" target="_blank">
            <i class="fas fa-fw fa-search"></i>
            <span>Pulse</span>
        </a>
    </li>
    @endif
    @if (auth()->user()->hasRole('Administrador'))
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <!-- Nav Item - Paciente -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('permissions.index') }}">
            <i class="fas fa-fw fa-lock"></i>
            <span>Permissões</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Regras</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuários</span>
        </a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
</ul>
<!-- End of Sidebar -->
