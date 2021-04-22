@extends('layouts.front')

@section('content-header')
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Konfirmasi</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Konfirmasi Pesanan</a></li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection


@section('content')
<div class="container">
  @if ($order->status == 4)
  <div class="error-page">
    <h2 class="headline text-success">#{{ $order->id }}</h2>

    <div class="error-content">
      <h3><i class="fas fa-check text-success"></i> Anda telah mengkonfirmasi penerimaan barang.</h3>

      <p>
        Terimah kasih telah menggunakan layanan ekspedisi anugrah indah.
        Jika anda mempunyai saran dan kritik, silahkan hubungi kami melalui pesan :)
      </p>

      {{-- <form class="search-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <!-- /.input-group -->
      </form> --}}
    </div>
  </div>
  <!-- /.error-page -->
  @endif
</div><!-- /.container-fluid -->
@endsection
