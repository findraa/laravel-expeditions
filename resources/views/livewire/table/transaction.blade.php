<div>
  <x-data-table :data="$data" :model="$transactions">
    <x-slot name="head">
      <tr>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('id')" role="button" href="#">
            ID
            @include('components.sort-icon', ['field' => 'id'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('tracking_number')" role="button" href="#">
            Tracking
            @include('components.sort-icon', ['field' => 'tracking_number'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('sender_name')" role="button" href="#">
            Pengirim
            @include('components.sort-icon', ['field' => 'sender_name'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('name')" role="button" href="#">
            Tujuan
            @include('components.sort-icon', ['field' => 'name'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('total')" role="button" href="#">
            Total
            @include('components.sort-icon', ['field' => 'total'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
            Tanggal
            @include('components.sort-icon', ['field' => 'created_at'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('status')" role="button" href="#">
            Status
            @include('components.sort-icon', ['field' => 'status'])
          </a></th>
        {{-- <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
            Diupdate
            @include('components.sort-icon', ['field' => 'updated_at'])
          </a></th> --}}
        <th>Action</th>
      </tr>
    </x-slot>
    <x-slot name="body">
      @foreach ($transactions as $transaction)
      <tr x-data="window.__controller.dataTableController({{ $transaction->id }})">
        <td><a href="{{ route('invoice.view', $transaction->id) }}" target="_blank"><strong
              class="text-primary">{{ $transaction->id }}</strong></a></td>
        <td><a href="{{ route('tracking.view', $transaction->tracking_number) }}" target="_blank"><strong
              class="text-primary">{{ $transaction->tracking_number }}</strong></a></td>
        <td>{{ $transaction->sender_name }}</td>
        <td>{{ $transaction->city->name }}</td>
        <td>Rp. {{ number_format($transaction->total) }}</td>
        <td>{{ $transaction->created_at->format('d M Y') }}</td>
        <td>{!! $transaction->status_label !!}</td>
        {{-- <td>{{ $transaction->updated_at->format('d M H:i') }}</td> --}}
        <td>
          {{-- <a role="button" href="/transaction/edit/{{ $transaction->id }}" class="mr-3"><i
            class="fa fa-16px fa-calendar-check"></i> </a> --}}
          @if ($transaction->status != 4)
          <button role="button" wire:click="$emit('updateItem', {{$transaction->id}})" type="button"
            class="btn btn-primary btn-sm">Update
          </button>
          {{-- <a role="button" wire:click="$emit('updateItem', {{$transaction->id}})" href="#"><i
            class="fa fa-16px fa-check"></i></a> --}}
          @endif
          {{-- <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i>
          </a> --}}
        </td>
      </tr>
      @endforeach
    </x-slot>
  </x-data-table>
</div>

@push('scripts')
<script>
  document.addEventListener('livewire:load', function () {
        @this.on('updateItem', id => {
            Swal.fire({
            title: 'Update status transaksi?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak, batal!'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                    @this.call('updateItem',id)

                    Swal.fire(
                        'Success!',
                        'Status transaksi berhasil diupdate.',
                        'success'
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'Proses update dibatalkan!',
                        'error'
                    )
                }
            });
        })
    })
</script>
@endpush
