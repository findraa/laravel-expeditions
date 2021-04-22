<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Buat Data Tracking') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></div>
      <div class="breadcrumb-item"><a href="{{ route('tracking') }}">Pengiriman</a></div>
      <div class="breadcrumb-item"><a href="{{ route('tracking.new') }}">Buat Data Tracking</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:create-tracking action="createTracking" />
  </div>
</x-app-layout>
