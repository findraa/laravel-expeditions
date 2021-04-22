<div id="form-create">
  <x-jet-form-section :submit="$action" class="mb-4">
    <x-slot name="title">
      {{ __('Buat Data Tracking') }}
    </x-slot>

    <x-slot name="description">
      {{ __('Lengkapi data berikut dan submit untuk memperbaruhi status tracking') }}
    </x-slot>

    <x-slot name="form">
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="transaction_id" value="{{ __('Transaksi') }}" />
        <select id="transaction_id" class="mt-1 block w-full form-control" wire:model.defer="tracking.transaction_id" />
        <option value="">Pilih Transaksi</option>
        @foreach ($transaction as $row)
        <option value="{{ $row->id }}">No.Pesanan: {{ $row->id }} - {{ $row->tracking_number }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="tracking.transaction_id" class="mt-2" />
      </div>

      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="province_id" value="{{ __('Provinsi') }}" />
        <select id="province_id" class="mt-1 block w-full form-control" wire:model="selectedState" />
        <option value="">Pilih Provinsi</option>
        @foreach($states as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="tracking.city_id" class="mt-2" />
      </div>

      @if (!is_null($selectedState))
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="city_id" value="{{ __('Kabupaten/Kota') }}" />
        <select id="city_id" class="mt-1 block w-full form-control" wire:model.defer="tracking.city_id" />
        <option value="">Pilih Kabupaten/Kota</option>
        @foreach($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="tracking.city_id" class="mt-2" />
      </div>
      @endif
    </x-slot>

    <x-slot name="actions">
      <x-jet-action-message class="mr-3" on="saved">
        {{ __($button['submit_response']) }}
      </x-jet-action-message>

      <x-jet-button>
        {{ __($button['submit_text']) }}
      </x-jet-button>
    </x-slot>
  </x-jet-form-section>

  <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
