<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon">
        <i class="fas fa-church"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SionerZ</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
    
      <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span>
      </a>
         
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ Request::routeIs('admin.member_datas.*') ? 'active' : '' }}"> 
    <a class="nav-link" href="{{ route('admin.member_datas.index') }}">
        <i class="fas fa-users"></i>
        <span>Anggota </span>
    </a>
  </li>
  <li class="nav-item {{ Request::routeIs('groups.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('groups.index') }}">
        <i class="fas fa-church"></i>
        <span>Kolom </span>
    </a>
  </li>
  <li class="nav-item  {{ Request::routeIs('admin.posts.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.posts.index') }}">
        <i class="fas fa-newspaper"></i>
        <span>Khotbah dan Artikel </span><span class="badge badge-danger">{{ DB::table('posts')->where('published',false)->count() }}</span> 
    </a>
  </li>

  <li class="nav-item {{ (Request::routeIs('admin.sectors.*') || Request::routeIs('admin.schedules.*') || Request::routeIs('get-schedule')) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.sectors.index') }}">
        <i class="fas fa-users"></i>
        <span>Kelompok</span>
    </a>
  </li>

  <li class="nav-item {{ (Request::routeIs('admin.criticism.index')) ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.criticism.index') }}">
      <i class="fas fa-comments"></i>
      <span>Kritik dan Saran</span>
    </a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>