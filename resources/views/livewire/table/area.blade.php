<div>
  <x-data-table :data="$data" :model="$areas">
    <x-slot name="head">
      <tr>
        <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            ID
            @include('components.sort-icon', ['field' => 'id'])
          </a></th>
        <th><a wire:click.prevent="sortBy('expedition_id')" role="button" href="#">
            Ekspedisi
            @include('components.sort-icon', ['field' => 'name'])
          </a></th>
        <th><a wire:click.prevent="sortBy('price')" role="button" href="#">
            Harga
            @include('components.sort-icon', ['field' => 'price'])
          </a></th>
        <th><a wire:click.prevent="sortBy('destination')" role="button" href="#">
            Tujuan
            @include('components.sort-icon', ['field' => 'destination'])
          </a></th>
        <th><a wire:click.prevent="sortBy('weight')" role="button" href="#">
            Satuan
            @include('components.sort-icon', ['field' => 'weight'])
          </a></th>
        <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
            Tanggal Dibuat
            @include('components.sort-icon', ['field' => 'created_at'])
          </a></th>
        {{-- <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
            Tanggal Diupdate
            @include('components.sort-icon', ['field' => 'updated_at'])
          </a></th> --}}
        <th>Action</th>
      </tr>
    </x-slot>
    <x-slot name="body">
      @foreach ($areas as $area)
      <tr x-data="window.__controller.dataTableController({{ $area->id }})">
        <td>{{ $area->id }}</td>
        <td>{{ $area->expedition->name }}</td>
        <td>{{ $area->price }}</td>
        <td>{{ $area->destination }}</td>
        <td>{{ $area->weight }}</td>
        <td>{{ $area->created_at->format('d M Y H:i') }}</td>
        {{-- <td>{{ $area->updated_at->format('d M Y H:i') }}</td> --}}
        <td class="whitespace-no-wrap row-action--icon">
          <a role="button" href="/area/edit/{{ $area->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
          <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
        </td>
      </tr>
      @endforeach
    </x-slot>
  </x-data-table>
</div>
