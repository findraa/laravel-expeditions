@extends('layouts.front')

@section('content-header')
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">{{ __('Resi Pengiriman') }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Cek Resi</li>
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
          <h3 class="card-title">Cek Resi Pengiriman</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('check.shipping') }}" method="GET" class="form-horizontal">
          <div class="card-body">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="form-group row">
              <label for="transaction_id" class="col-sm-3 col-form-label">Masukkan Nomor Pengiriman</label>
              <div class="col-sm-9">
                <input type="text" name="transaction_id" class="form-control" id="transaction_id"
                  placeholder="Masukkan Nomor Pengiriman">
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
