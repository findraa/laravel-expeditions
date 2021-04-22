<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Pesan Masuk') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Pesan</a></div>
      <div class="breadcrumb-item"><a href="{{ route('message') }}">Pesan Masuk</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:table.main name="message" :model="$message" />
  </div>
</x-app-layout>
