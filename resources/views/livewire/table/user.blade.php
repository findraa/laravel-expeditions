<div>
  <x-data-table :data="$data" :model="$users">
    <x-slot name="head">
      <tr>
        <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
            ID
            @include('components.sort-icon', ['field' => 'id'])
          </a></th>
        <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
            Nama
            @include('components.sort-icon', ['field' => 'name'])
          </a></th>
        <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
            Email
            @include('components.sort-icon', ['field' => 'email'])
          </a></th>
        <th><a wire:click.prevent="sortBy('phone_number')" role="button" href="#">
            Telp
            @include('components.sort-icon', ['field' => 'phone_number'])
          </a></th>
        <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
            Tanggal Dibuat
            @include('components.sort-icon', ['field' => 'created_at'])
          </a></th>
        <th><a wire:click.prevent="sortBy('role')" role="button" href="#">
            Role
            @include('components.sort-icon', ['field' => 'role'])
          </a></th>
        <th>Action</th>
      </tr>
    </x-slot>
    <x-slot name="body">
      @foreach ($users as $user)
      <tr x-data="window.__controller.dataTableController({{ $user->id }})">
        <td>{{ $user->id }}</td>
        <td><a href="#" class="font-weight-600"><img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
              width="30" class="rounded-circle mr-1">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->created_at->format('d M Y') }}</td>
        <td>{!! $user->role_label !!}
        </td>
        <td class="whitespace-no-wrap row-action--icon">
          <a role="button" href="/user/edit/{{ $user->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
          <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
        </td>
      </tr>
      @endforeach
    </x-slot>
  </x-data-table>
</div>
