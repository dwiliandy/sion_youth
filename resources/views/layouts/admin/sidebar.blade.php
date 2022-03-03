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
  <li class="nav-item active">
    
      <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span>
      </a>
         
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ Request::routeIs('groups*') ? 'active' : '' }}">
    
    <a class="nav-link" href="{{ route('member_data.index') }}">
        <i class="fas fa-users"></i>
        <span>Anggota </span>
    </a>
    <a class="nav-link" href="{{ route('groups.index') }}">
        <i class="fas fa-church"></i>
        <span>Kolom </span>
    </a>
    <a class="nav-link" href="{{ route('admin.posts.index') }}">
        <i class="fas fa-newspaper"></i>
        <span>Khotbah dan Artikel </span><span class="badge badge-danger">{{ DB::table('posts')->where('published',false)->count() }}</span> 
    </a>
    <a class="nav-link" href="{{ route('admin.sectors.index') }}">
        <i class="fas fa-users"></i>
        <span>Kelompok</span>
    </a>
       
</li>
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="buttons.html">Buttons</a>
              <a class="collapse-item" href="cards.html">Cards</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="utilities-color.html">Colors</a>
              <a class="collapse-item" href="utilities-border.html">Borders</a>
              <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>