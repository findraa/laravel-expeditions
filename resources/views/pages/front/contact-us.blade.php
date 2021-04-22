@extends('layouts.front')

@section('content-header')
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Kontak Kami</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Kontak</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container">
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="row">
    <div class="col-md-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Send Message</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('front.send_message') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card-body">

            <div class="form-group row">
              <label for="tracking_number" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
              </div>
            </div>
            <div class="form-group row">
              <label for="tracking_number" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <p class="text-danger">{{ $errors->first('email') }}</p>
              </div>
            </div>
            <div class="form-group row">
              <label for="tracking_number" class="col-sm-3 col-form-label">Pesan</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="message" rows="6"
                  placeholder="Pesan...">{{ old('message') }}</textarea>
                <p class="text-danger">{{ $errors->first('message') }}</p>
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
    <div class="col-md-6">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Map Location</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('check.tracking') }}" method="POST" class="form-horizontal">
          <div class="card-body">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="form-group row">
              {{-- <label for="tracking_number" class="col-sm-3 col-form-label">Alamat</label> --}}
              <div class="col-sm-7">
                <strong class=""><i class="fas fa-map-marker-alt mr-1"></i> Jl. Kalimantan No. 148, Makassar</strong>
              </div>
              <div class="col-sm-5">
                <strong class=""><i class="fas fa-phone mr-1"></i> 085298907939</strong>
              </div>
              {{-- <div class="col-sm-3">
                <strong class=""><i class="fas fa-envelope mr-1"></i> anugrahindah@info.com</strong>
              </div> --}}
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1986.9467338039995!2d119.41079067931726!3d-5.120865167722134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m1!1m0!5e0!3m2!1sen!2sid!4v1616203063997!5m2!1sen!2sid"
                  width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </form>
      </div>
      <!-- /.card -->

    </div>
  </div>

</div>
@endsection
