@extends('layouts.front')

@section('content-header')
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">No. Tracking #{{ $tracking->tracking_number }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/">Tracking</a></li>
        <li class="breadcrumb-item active">Status Tracking</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container">

  <!-- Timelime example  -->
  <div class="row">
    <div class="col-md-12">
      <!-- The time line -->
      <div class="timeline">
        <!-- timeline time label -->
        {{-- <div class="time-label">
          <span class="bg-red">10 Feb. 2014</span>
        </div> --}}
        <!-- /.timeline-label -->
        @if (!is_null($tracking->accepted_at))
        <div>
          <i class="fas fa-truck bg-blue"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{ $tracking->accepted_at->format('d M H:i') }}</span>
            <div class="timeline-body">
              Pesanan telah diterima oleh {{ $tracking->reciver_name }}".
            </div>
          </div>
        </div>
        @endif

        @if (!is_null($tracking->finish_at))
        <div>
          <i class="fas fa-truck bg-blue"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{ $tracking->finish_at->format('d M H:i') }}</span>
            <div class="timeline-body">
              Pesanan telah sampai di drop point {{ $tracking->city->name }}.
            </div>
          </div>
        </div>
        @endif

        @foreach ($tracking->trackings as $row)
        <!-- timeline item -->
        <div>
          <i class="fas fa-truck bg-blue"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{ $tracking->created_at->format('d M H:i') }}</span>
            <div class="timeline-body">
              [{{ $row->city->name }}] Pesanan sedang berada dalam perjalanan.
            </div>
          </div>
        </div>
        <!-- END timeline item -->
        @endforeach

        @if (!is_null($tracking->shipping_at))
        <!-- timeline item -->
        <div>
          <i class="fas fa-truck bg-blue"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{ $tracking->shipping_at->format('d M H:i') }}</span>
            <div class="timeline-body">
              [Makassar] Pesanan telah keluar dari gudang.
            </div>
          </div>
        </div>
        <!-- END timeline item -->
        @endif

        @if (!is_null($tracking->process_at))
        <!-- timeline item -->
        <div>
          <i class="fas fa-truck-loading bg-blue"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{ $tracking->process_at->format('d M H:i') }}</span>
            <div class="timeline-body">
              Pesanan telah diproses dan akan segera di serahkan ke kurir.
            </div>
          </div>
        </div>
        <!-- END timeline item -->
        @endif

        <!-- timeline item -->
        <div>
          <i class="fas fa-box bg-blue"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{ $tracking->created_at->format('d M H:i') }}</span>
            <div class="timeline-body">
              Pesanan telah diterima dan akan segera di proses.
            </div>
          </div>
        </div>
        <!-- END timeline item -->

      </div>
    </div>
    <!-- /.col -->
  </div>
</div>
<!-- /.timeline -->
@endsection
