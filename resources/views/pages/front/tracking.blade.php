@extends('layouts.front')

@section('content-header')
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Tracking Pengiriman</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Cek Tracing</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Cek Tracking Pengiriman</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('check.tracking') }}" method="GET" class="form-horizontal">
          <div class="card-body">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="form-group row">
              <label for="tracking_number" class="col-sm-3 col-form-label">Masukkan Nomor Tracking</label>
              <div class="col-sm-9">
                <input type="text" name="tracking_number" class="form-control" id="tracking_number"
                  placeholder="Masukkan Nomor Tracking">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->

    </div>
  </div>
</div>
@endsection
