@php
$links = [
[
"href" => "dashboard",
"text" => "Dashboard",
"is_multi" => false,
],
[
"href" => [
[
"section_text" => "User",
"section_list" => [
["href" => "user", "text" => "Data User"],
["href" => "user.new", "text" => "Buat User"]
]
],

[
"section_text" => "Area",
"section_list" => [
["href" => "area", "text" => "Data Area"],
["href" => "area.new", "text" => "Buat Area"]
]
],

[
"section_text" => "Ekspedisi",
"section_list" => [
["href" => "expedition", "text" => "Data Ekspedisi"],
["href" => "expedition.new", "text" => "Buat Ekspedisi"]
]
],

[
"section_text" => "Pesan",
"section_list" => [
["href" => "message", "text" => "Pesan Masuk"],
]
],

[
"section_text" => "Transaksi",
"section_list" => [
["href" => "transaction", "text" => "Data Transaksi"],
["href" => "transaction.new", "text" => "Buat Transaksi"]
]
],
[
"section_text" => "Laporan",
"section_list" => [
["href" => "report.transaction", "text" => "Laporan Transaksi"]
]
],
],

"text" => "Master Data",
"is_multi" => true,

],

];

$navigation_links = array_to_object($links);
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
    @foreach ($navigation_links as $link)
    <ul class="sidebar-menu">
      <li class="menu-header">{{ $link->text }}</li>
      @if (!$link->is_multi)
      <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route($link->href) }}"><i
            class="fas fa-tachometer-alt"></i><span>{{$link->text}}</span></a>
      </li>
      @else
      @foreach ($link->href as $section)
      @php
      $routes = collect($section->section_list)->map(function ($child) {
      return Request::routeIs($child->href);
      })->toArray();

      $is_active = in_array(true, $routes);
      @endphp

      <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i>
          <span>{{ $section->section_text }}</span></a>
        <ul class="dropdown-menu">
          @foreach ($section->section_list as $child)
          <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link"
              href="{{ route($child->href) }}">{{ $child->text }}</a></li>
          @endforeach
        </ul>
      </li>
      @endforeach
      @endif
    </ul>
    @endforeach
  </aside>
</div>
