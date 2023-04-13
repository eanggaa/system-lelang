<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <img src="{{ asset('logo-saranawisesa.png') }}" width="50px" alt="">
      <a href="index.html" class="d-block">Eproc</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <img src="{{ asset('logo-saranawisesa.png') }}" width="30px" alt="">
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      @if(auth()->user()->level == 1)
        <li class=active><a class="nav-link" href="{{ route('eproc.superadmin.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li><a class="nav-link" href="{{ route('eproc.superadmin.akun.index') }}"><i class="far fa-square"></i><span>Akun</span></a></li>
        <li><a class="nav-link" href="{{ route('eproc.superadmin.berita.index') }}"><i class="far fa-square"></i><span>Berita</span></a></li>
        @endif
        @if(auth()->user()->level == 2)
        <li class=active><a class="nav-link" href="{{ route('eproc.admin.dashboard') }}"><i class="far fa-square"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li><a class="nav-link" href="{{ route('eproc.admin.berita.index') }}"><i class="far fa-square"></i><span>Berita</span></a></li>
      @endif
    </ul>
  </aside>
</div>