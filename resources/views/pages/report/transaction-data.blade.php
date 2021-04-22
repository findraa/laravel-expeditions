<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Laporan Transaksi') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      {{-- <div class="breadcrumb-item"><a href="#">User</a></div> --}}
      <div class="breadcrumb-item"><a href="{{ route('transaction') }}">Laporan Transaksi</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:table.main name="transaction-report" :model="$transaction" />
  </div>
</x-app-layout>
