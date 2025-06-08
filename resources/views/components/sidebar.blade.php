<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('layouts.homepage') }}">
        <div class="sidebar-brand-text mx-3">Admin Budaya</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <!-- Nav Item - Seniman -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.seniman.index') }}">
            <i class="fas fa-user"></i>
            <span>Data Seniman</span>
        </a>
    </li>

    <!-- Nav Item - Budaya -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.budaya.index') }}">
            <i class="fas fa-landmark"></i>
            <span>Data Budaya</span>
        </a>
    </li>

    <!-- Nav Item - Agenda -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.agenda.index') }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Data Agenda</span>
        </a>
    </li>

    <!-- Nav Item - Contact -->
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.contacts.index') }}">
        <i class="fas fa-fw fa-envelope"></i> {{-- Icon email atau pesan --}}
        <span>Data Kontak</span>
    </a>
</li>

    <!-- Nav Item - Logout -->
<!-- Nav Item - Logout -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
