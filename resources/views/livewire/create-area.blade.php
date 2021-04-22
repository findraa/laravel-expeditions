<div id="form-create">
  <x-jet-form-section :submit="$action" class="mb-4">
    <x-slot name="title">
      {{ __('Area') }}
    </x-slot>

    <x-slot name="description">
      {{ __('Lengkapi data berikut dan submit untuk membuat data baru') }}
    </x-slot>

    <x-slot name="form">
      <div class="col-span-6 form-group sm:col-span-5">
        <x-jet-label for="expedition_id" value="{{ __('Ekspedisi') }}" />
        <select id="expedition_id" name="expedition_id" class="block w-full mt-1 shadow-none form-control"
          wire:model.defer="area.expedition_id" />
        <option value="">Pilih</option>

        @foreach ($expedition as $row)
        {{-- <option value="{{ $row->id }}" {{ old('expedition_id') == $row->id ? 'selected':'' }}>{{ $row->name }}
        </option> --}}
        <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endforeach
        </select>
        <x-jet-input-error for="area.expedition_id" class="mt-2" />
      </div>

      <div class="col-span-6 form-group sm:col-span-5">
        <x-jet-label for="price" value="{{ __('Harga') }}" />
        <x-jet-input id="price" type="text" class="block w-full mt-1 shadow-none form-control"
          wire:model.defer="area.price" />
        <x-jet-input-error for="area.price" class="mt-2" />
      </div>

      <div class="col-span-6 form-group sm:col-span-5">
        <x-jet-label for="weight" value="{{ __('Berat') }}" />
        <select id="weight" name="weight" class="block w-full mt-1 shadow-none form-control"
          wire:model.defer="area.weight" />
        <option value="">Pilih</option>
        <option value="/Kg">/Kg</option>
        <option value="/Koly">/Koly</option>
        <option value="/Ton">/Ton</option>
        <option value="/Container">/Container</option>
        </select>
        <x-jet-input-error for="area.weight" class="mt-2" />
      </div>

      <div class="col-span-6 form-group sm:col-span-5">
        <x-jet-label for="destination" value="{{ __('Tujuan') }}" />
        <x-jet-input id="destination" type="text" class="block w-full mt-1 shadow-none form-control"
          wire:model.defer="area.destination" />
        <x-jet-input-error for="area.destination" class="mt-2" />
      </div>

      <div class="col-span-6 form-group sm:col-span-5">
        <x-jet-label for="estimate" value="{{ __('Estimasi') }}" />
        <x-jet-input id="estimate" type="text" class="block w-full mt-1 shadow-none form-control"
          wire:model.defer="area.estimate" />
        <x-jet-input-error for="area.estimate" class="mt-2" />
      </div>
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
