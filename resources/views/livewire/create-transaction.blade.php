<div id="form-create">
  <x-jet-form-section :submit="$action" class="mb-4">
    <x-slot name="title">
      {{ __('Transaksi') }}
    </x-slot>

    <x-slot name="description">
      {{ __('Lengkapi data berikut dan submit untuk membuat data transaksi') }}
    </x-slot>

    <x-slot name="form">
      @if ($action == "createTransaction")
      <div class="form-group col-span-7 sm:col-span-3">
        <x-jet-label for="sender_name" value="{{ __('Nama Pengirim') }}" />
        <x-jet-input id="sender_name" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="Nama Pengirim" wire:model.defer="transaction.sender_name" />
        <x-jet-input-error for="transaction.sender_name" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-3">
        <x-jet-label for="sender_phone" value="{{ __('No. Telpon Pengirim') }}" />
        <x-jet-input id="sender_phone" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="08521213454" wire:model.defer="transaction.sender_phone" />
        <x-jet-input-error for="transaction.sender_phone" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="sender_address" value="{{ __('Alamat Pengirim') }}" />
        <x-jet-input id="sender_address" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="Alamat Lengkap" wire:model.defer="transaction.sender_address" />
        <x-jet-input-error for="transaction.sender_address" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-3">
        <x-jet-label for="reciver_name" value="{{ __('Nama Penerima') }}" />
        <x-jet-input id="reciver_name" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="Nama Penerima" wire:model.defer="transaction.reciver_name" />
        <x-jet-input-error for="transaction.reciver_name" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-3">
        <x-jet-label for="reciver_phone" value="{{ __('No. Telpon Penerima') }}" />
        <x-jet-input id="reciver_phone" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="08521213454" wire:model.defer="transaction.reciver_phone" />
        <x-jet-input-error for="transaction.reciver_phone" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="reciver_address" value="{{ __('Alamat Penerima') }}" />
        <x-jet-input id="reciver_address" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="Alamat Lengkap" wire:model.defer="transaction.reciver_address" />
        <x-jet-input-error for="transaction.reciver_address" class="mt-2" />
      </div>

      <div class="form-group col-span-7 sm:col-span-3">
        <x-jet-label for="province_id" value="{{ __('Provinsi') }}" />
        <select id="province_id" class="mt-1 block w-full form-control shadow-none" wire:model="selectedState" />
        <option value="">Pilih Provinsi</option>
        @foreach($states as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="transaction.city_id" class="mt-2" />
      </div>

      @if (!is_null($selectedState))
      <div class="form-group col-span-7 sm:col-span-3">
        <x-jet-label for="city_id" value="{{ __('Kabupaten/Kota') }}" />
        <select id="city_id" class="mt-1 block w-full form-control shadow-none"
          wire:model.defer="transaction.city_id" />
        <option value="">Pilih Kabupaten/Kota</option>
        @foreach($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="tracking.city_id" class="mt-2" />
      </div>
      @endif

      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="user_id" value="{{ __('Kurir') }}" />
        <select id="user_id" class="mt-1 block w-full form-control shadow-none"
          wire:model.defer="transaction.user_id" />
        <option value="">Pilih Kurir</option>
        @foreach ($users as $row)
        <option value="{{ $row->id }}">#UID:{{ $row->id }} - {{ $row->name }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="transaction.user_id" class="mt-2" />
      </div>
      @endif

      @if ($action == "updateTransaction")
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="tracking_number" value="{{ __('No. Tracking') }}" />
        <input id="tracking_number" type="dsable" class="mt-1 block w-full form-control shadow-none"
          value="{{ $transaction->tracking_number }}" />
      </div>
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="status" value="{{ __('Status') }}" />
        <select id="status" class="mt-1 block w-full form-control shadow-none" wire:model.defer="transaction.status" />
        <option value="1" {{ $transaction->status == '0' ? 'selected':'' }}>Proses</option>
        <option value="2" {{ $transaction->status == '1' ? 'selected':'' }}>Kirim</option>
        <option value="3" {{ $transaction->status == '2' ? 'selected':'' }}>Selesai</option>
        </select>
        <x-jet-input-error for="transaction.status" class="mt-2" />
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
