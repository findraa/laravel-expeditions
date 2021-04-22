<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Buat Area Baru') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Ekspedisi</a></div>
      <div class="breadcrumb-item"><a href="{{ route('area') }}">Buat Ekspedisi Baru</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:create-area action="createArea" />
  </div>
</x-app-layout>
