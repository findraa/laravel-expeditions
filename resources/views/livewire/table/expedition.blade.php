<div>
  <x-data-table :data="$data" :model="$expeditions">
    <x-slot name="head">
      <tr>
        <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            ID
            @include('components.sort-icon', ['field' => 'id'])
          </a></th>
        <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            Nama
            @include('components.sort-icon', ['field' => 'name'])
          </a></th>
        <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
            Tanggal Dibuat
            @include('components.sort-icon', ['field' => 'created_at'])
          </a></th>
        <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
            Tanggal Diupdate
            @include('components.sort-icon', ['field' => 'updated_at'])
          </a></th>
        <th>Action</th>
      </tr>
    </x-slot>
    <x-slot name="body">
      @foreach ($expeditions as $expedition)
      <tr x-data="window.__controller.dataTableController({{ $expedition->id }})">
        <td>{{ $expedition->id }}</td>
        <td>{{ $expedition->name }}</td>
        <td>{{ $expedition->created_at->format('d M Y H:i') }}</td>
        <td>{{ $expedition->updated_at->format('d M Y H:i') }}</td>
        <td class="whitespace-no-wrap row-action--icon">
          <a role="button" href="/expedition/edit/{{ $expedition->id }}" class="mr-3"><i
              class="fa fa-16px fa-pen"></i></a>
          <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
        </td>
      </tr>
      @endforeach
    </x-slot>
  </x-data-table>
</div>
