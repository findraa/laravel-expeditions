<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

  @isset($meta)
  {{ $meta }}
  @endisset

  <!-- Styles -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@400;600;700&family=Open+Sans&display=swap">

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/notyf/notyf.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script src="https://kit.fontawesome.com/6f65dcd7f8.js" crossorigin="anonymous"></script>

  <livewire:styles />

  <!-- Scripts -->
  <script defer src="{{ asset('vendor/alpine.js') }}"></script>
</head>
<body class="antialiased">
  <div id="app">
    <div class="main-wrapper">
      @include('components.navbar')

      @if (auth()->user()->role == '0')
      @include('components.sidebar')
      @endif

      @if (auth()->user()->role == '1')
      @include('components.user-sidebar')
      @endif
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            @isset($header_content)
            {{ $header_content }}
            @else
            {{ __('Profile') }}
            @endisset
          </div>

          <div class="section-body">
            {{ $slot }}
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <script>
            document.write(new Date().getFullYear());
          </script> <a href="/">Anugrah Indah</a>.
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  @stack('modals')

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
  <script defer async src="{{ asset('stisla/js/modules/popper.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script defer async src="{{ asset('stisla/js/modules/tooltip.js') }}"></script>
  <script src="{{ asset('stisla/js/modules/bootstrap.min.js') }}"></script>
  <script defer src="{{ asset('stisla/js/modules/jquery.nicescroll.min.js') }}"></script>
  <script defer src="{{ asset('stisla/js/modules/moment.min.js') }}"></script>
  <script defer src="{{ asset('stisla/js/modules/marked.min.js') }}"></script>
  <script defer src="{{ asset('vendor/notyf/notyf.min.js') }}"></script>
  <script defer src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
  <script defer src="{{ asset('stisla/js/modules/chart.min.js') }}"></script>
  <script defer src="{{ asset('vendor/select2/select2.min.js') }}"></script>

  <script src="{{ asset('stisla/js/stisla.js') }}"></script>
  <script src="{{ asset('stisla/js/scripts.js') }}"></script>

  <livewire:scripts />
  @livewireChartsScripts
  <script src="{{ mix('js/app.js') }}" defer></script>

  @stack('scripts')
</body>
</html>
