<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Edit Data Tracking') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Tracking</a></div>
      <div class="breadcrumb-item"><a href="{{ route('user') }}">Edit Tracking</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:create-tracking action="updateTracking" :trackingId="request()->trackingId" />
  </div>
</x-app-layout>
