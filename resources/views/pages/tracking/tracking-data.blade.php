<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Data Tracking') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Home</a></div>
      <div class="breadcrumb-item"><a href="#">Pengiriman</a></div>
      <div class="breadcrumb-item"><a href="">Data Tracking</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:table.main name="tracking" :model="$transaction" />
  </div>
</x-app-layout>
