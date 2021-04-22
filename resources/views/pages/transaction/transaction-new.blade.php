<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Buat Transaksi') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
      <div class="breadcrumb-item"><a href="{{ route('transaction') }}">Buat Transaksi</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:create-detail-transaction action="createDetailTransaction" />
    <livewire:create-transaction action="createTransaction" />
  </div>
</x-app-layout>
