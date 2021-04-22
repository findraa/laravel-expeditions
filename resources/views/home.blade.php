<x-app-layout>
  <x-slot name="header_content">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      {{-- <div class="breadcrumb-item"><a href="#">Layout</a></div> --}}
      {{-- <div class="breadcrumb-item">Default Layout</div> --}}
    </div>
  </x-slot>

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-address-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Kurir</h4>
          </div>
          <div class="card-body">
            {{ $user }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-map"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Expedisi</h4>
          </div>
          <div class="card-body">
            {{ $expedition }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-chart-bar"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Transaksi</h4>
          </div>
          <div class="card-body">
            {{ $transaction }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pengunjung</h4>
          </div>
          <div class="card-body">
            {{ $visitor }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <livewire:show-charts />
</x-app-layout>
