@php
$user = auth()->user();
@endphp
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">Dashboard</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">
        <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('img/logo.png') }}" alt="">
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard Courier</li>
      <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i><span>Home</span></a>
      </li>
      <li class="{{ Request::routeIs('tracking') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tracking') }}"><i class="fas fa-tachometer-alt"></i><span>Daftar
            Pengiriman</span></a>
      </li>
    </ul>
  </aside>
</div>
