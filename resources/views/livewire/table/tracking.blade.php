<div>
  <x-data-table :data="$data" :model="$trackings">
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
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('reciver_name')" role="button" href="#">
            Penerima
            @include('components.sort-icon', ['field' => 'reciver_name'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('name')" role="button" href="#">
            Tujuan
            @include('components.sort-icon', ['field' => 'name'])
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
      @foreach ($trackings as $row)
      <tr x-data="window.__controller.dataTableController({{ $row->id }})">
        <td><a href="{{ route('invoice.view', $row->id) }}" target="_blank"><strong
              class="text-primary">{{ $row->id }}</strong></a></td>
        <td><a href="{{ route('tracking.view', $row->tracking_number) }}" target="_blank"><strong
              class="text-primary">{{ $row->tracking_number }}</strong></a></td>
        <td>
          {{ ucfirst($row->reciver_name) }}<br />
          <small>{{ $row->reciver_phone }}</small>
        </td>
        <td> {{ $row->city->name }} <br>
          <small>{{ $row->city->province->name }}, {{ $row->city->postal_code }}</small></td>
        <td>{{ $row->created_at->format('d M Y H:i') }}</td>
        <td>{!! $row->status_label !!}</td>
        {{-- <td>{{ $row->updated_at->format('d M H:i') }}</td> --}}
        <td align="center">
          {{-- <a role="button" href="/row/edit/{{ $row->id }}" class="mr-3"><i
            class="fa fa-16px fa-calendar-check"></i> </a> --}}
          @if ($row->status != 4)
          <button role="button" wire:click="$emit('updateItem', {{$row->id}})" type="button"
            class="btn btn-primary btn-sm icon-left">Update
          </button>
          @endif
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
