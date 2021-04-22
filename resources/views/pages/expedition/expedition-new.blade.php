<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Buat Ekspedisi Baru') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Ekspedisi</a></div>
      <div class="breadcrumb-item"><a href="{{ route('expedition') }}">Buat Ekspedisi Baru</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:create-expedition action="createExpedition" />
  </div>
</x-app-layout>
