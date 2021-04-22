@extends('layouts.front')

@section('content-header')
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Home</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection


@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><i class="fas fa-arrow-circle-right"></i></a></h3>

          <p>Resi Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Click here</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><i class="fas fa-arrow-circle-right"></i></a></h3>
          <p>Status Tracking</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Click here</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><i class="fas fa-arrow-circle-right"></i></a></h3>

          <p>Kontak Kami</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Click here</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><i class="fas fa-arrow-circle-right"></i></a></h3>
          <p>Konfirmasi</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">Click here</a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
