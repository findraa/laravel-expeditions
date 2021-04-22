@php
$links = [
[
"href" => "front.shipping",
"text" => "Cek Resi",
"is_multi" => false,
],
[
"href" => "front.tracking",
"text" => "Tracking Pengiriman",
"is_multi" => false,
],
// [
// "href" => "front.cost",
// "text" => "Cek Tarif",
// "is_multi" => false,
// ],
[
"href" => "front.contact",
"text" => "Kontak Kami",
"is_multi" => false,
]
];

$navigation_links = array_to_object($links);
@endphp

<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
  <div class="container">
    <a href="/" class="navbar-brand">
      <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">Anugrah Indah</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      @foreach ($navigation_links as $link)
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::routeIs($link->href) ? 'active' : '' }}">
          <a href="{{ route($link->href) }}" class="nav-link">{{ $link->text }}</a>
        </li>
      </ul>
      @endforeach

      <!-- SEARCH FORM -->
      <form class="form-inline ml-0 ml-md-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</nav>
<!-- /.navbar -->
