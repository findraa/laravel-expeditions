<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Data Area') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Area</a></div>
      <div class="breadcrumb-item"><a href="{{ route('area') }}">Data Area</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:table.main name="area" :model="$area" />
  </div>
</x-app-layout>
