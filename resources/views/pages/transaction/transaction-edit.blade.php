<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Edit Transaksi') }}</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">User</a></div>
      <div class="breadcrumb-item"><a href="{{ route('transaction') }}">Edit Transaksi</a></div>
    </div>
  </x-slot>

  <div>
    <livewire:create-transaction action="updateTransaction" :transactionId="request()->transactionId" />
  </div>
</x-app-layout>
