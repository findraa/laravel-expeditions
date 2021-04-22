<div>
  <x-data-table :data="$data" :model="$transactionReports">
    <x-slot name="head">
      <tr>
        <th>#</th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('id')" role="button" href="#">
            No. Transaksi
            @include('components.sort-icon', ['field' => 'id'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('tracking_number')" role="button" href="#">
            No. Tracking
            @include('components.sort-icon', ['field' => 'tracking_number'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('sender_name')" role="button" href="#">
            Customer
            @include('components.sort-icon', ['field' => 'sender_name'])
          </a></th>
        {{-- <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('destination')" role="button" href="#">
            Tujuan
            @include('components.sort-icon', ['field' => 'destination'])
          </a></th> --}}
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('total')" role="button" href="#">
            Total
            @include('components.sort-icon', ['field' => 'total'])
          </a></th>
        <th class="whitespace-no-wrap"><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
            Tanggal
            @include('components.sort-icon', ['field' => 'created_at'])
          </a></th>
        {{-- <th>Action</th> --}}
      </tr>
    </x-slot>
    <x-slot name="body">
      @foreach ($transactionReports as $row)
      <tr x-data="window.__controller.dataTableController({{ $row->id }})">
        <td>{{ $loop->iteration }}</td>
        <td><a href="{{ route('invoice.view', $row->id) }}" target="_blank"><strong
              class="text-primary">{{ $row->id }}</strong></a></td>
        <td><a href="{{ route('tracking.view', $row->tracking_number) }}" target="_blank"><strong
              class="text-primary">{{ $row->tracking_number }}</strong></a></td>
        <td>
          {{ $row->sender_name }} <br />
          <small>{{ $row->sender_address }}</small> <br />
          <small>{{ $row->sender_phone }}</small>
        </td>
        {{-- <td>{{ $row->area->destination }}</td> --}}
        <td>Rp. {{ number_format($row->total) }}</td>
        <td>{{ $row->created_at->format('d M Y H:i') }}</td>
      </tr>
      @endforeach
    </x-slot>
  </x-data-table>
</div>
