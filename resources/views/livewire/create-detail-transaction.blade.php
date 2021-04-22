<div id="form-create">
  <x-jet-form-section :submit="$action" class="mb-4">
    <x-slot name="title">
      {{ __('Detail Transaksi') }}
    </x-slot>

    <x-slot name="description">
      {{ __('Masukan data barang dan klik tombol submit untuk menyimpan data.') }}
    </x-slot>

    <x-slot name="form">
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="area_id" value="{{ __('Area Tujuan') }}" />
        <select id="area_id" name="area_id" class="mt-1 block w-full form-control shadow-none"
          wire:model.defer="detailTransaction.area_id" />
        <option value="">Pilih Area</option>

        @foreach ($areas as $row)
        {{-- <option value="{{ $row->id }}" {{ old('expedition_id') == $row->id ? 'selected':'' }}>{{ $row->name }}
        </option> --}}
        <option value="{{ $row->id }}">{{ $row->destination }} - {{ $row->price }} {{ $row->weight }} (Estimasi:
          {{ $row->estimate}})
        </option>
        @endforeach
        </select>
        <x-jet-input-error for="detailTransaction.area_id" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-6">
        <x-jet-label for="item_name" value="{{ __('Nama Barang') }}" />
        <x-jet-input id="item_name" type="text" class="mt-1 block w-full form-control shadow-none"
          placeholder="Nama Barang" wire:model.defer="detailTransaction.item_name" />
        <x-jet-input-error for="detailTransaction.item_name" class="mt-2" />
      </div>

      <div class="form-group col-span-7 sm:col-span-2">
        <x-jet-label for="qty" value="{{ __('Quantity') }}" />
        <x-jet-input id="qty" type="number" class="mt-1 block w-full form-control shadow-none" placeholder="1"
          wire:model.defer="detailTransaction.qty" />
        <x-jet-input-error for="detailTransaction.qty" class="mt-2" />
      </div>

      <div class="form-group col-span-7 sm:col-span-2">
        <x-jet-label for="weight" value="{{ __('Berat') }}" />
        <x-jet-input id="weight" type="number" class="mt-1 block w-full form-control shadow-none" placeholder="1"
          wire:model.defer="detailTransaction.weight" />
        <x-jet-input-error for="detailTransaction.weight" class="mt-2" />
      </div>
      <div class="form-group col-span-7 sm:col-span-2">
        <x-jet-secondary-button type="button" class="mt-4" wire:click="addItem">
          {{ __('Tambah') }}
        </x-jet-secondary-button>
      </div>

      <div class="form-group col-span-7 sm:col-span-6">
        <div class="row">
          <div class="table-responsive">
            <table class="table table-bordered table-striped text-sm text-gray-600">
              <thead>
                <tr>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Berat</th>
                  <th scope="col">Subtotal</th>
                  {{-- <th scope="col" style="width: 200px;">Total</th> --}}
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($carts as $cart)
                <tr>
                  <td>{{ $cart->item_name }}</td>
                  <td>{{ $cart->qty }}</td>
                  <td>{{ $cart->weight }}{{ $cart->area->weight}}</td>
                  <td>Rp. {{ number_format($cart->area->price * $cart->weight)}} </td>
                  <td>
                    <button type="button" wire:click="deleteTransaction({{$cart->id}})" class="btn btn-danger btn-sm"><i
                        class="fa fa-trash"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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
