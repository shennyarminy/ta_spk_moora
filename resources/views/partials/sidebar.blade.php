<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-item @if($aktif == 'home') {{'active'}}@endif">
        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
      </li>  

      <li class="menu-header">Master Data</li>
      <li class="nav-item @if ($aktif == 'criteria') {{'active'}}@endif">
        <a href="{{ route('criteria.index') }}" class="nav-link"><i class="fas fa-file"></i><span>Data Kriteria</span></a>
      </li>

      <li class="nav-item @if($aktif == 'subcriteria') {{ 'active' }}@endif">
        <a href="{{ route('subcriteria.index') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Data Subkriteria</span></a>
      </li>
  </aside>
</div>

