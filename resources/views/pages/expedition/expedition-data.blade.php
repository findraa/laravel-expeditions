<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Data Ekspedisi') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Ekspedisi</a></div>
      <div class="breadcrumb-item"><a href="{{ route('expedition') }}">Data Ekspedisi</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:table.main name="expedition" :model="$expedition" />
  </div>
</x-app-layout>
