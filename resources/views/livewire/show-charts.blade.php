<div>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card" style="height: 22rem;">
        <div class="card-header">
          <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
            <li>
              <input type="checkbox" value="1" wire:model="types" />
              <span>Diproses</span>
            </li>
            <li>
              <input type="checkbox" value="2" wire:model="types" />
              <span>Dikirim</span>
            </li>
            <li>
              <input type="checkbox" value="3" wire:model="types" />
              <span>Selesai</span>
            </li>
            <li>
              <input type="checkbox" value="4" wire:model="types" />
              <span>Diterima</span>
            </li>
            <li>
              <input type="checkbox" value="0" wire:model="types" />
              <span>Other</span>
            </li>
          </ul>

          <div>
            <input type="checkbox" value="0" wire:model="showDataLabels" />
            <span>Label</span>
          </div>
        </div>
        <div class="card-body">
          <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}"
            :column-chart-model="$columnChartModel" />
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
      <div class="card" style="height: 22rem;">
        <div class="card-header">
          <h4>Bar Chart</h4>
        </div>
        <div class="card-body">
          <livewire:livewire-pie-chart key="{{ $pieChartModel->reactiveKey() }}" :pie-chart-model="$pieChartModel" />
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50">
    <ul class="flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
      <li>
        <input type="checkbox" value="travel" wire:model="types" />
        <span>1</span>
      </li>
      <li>
        <input type="checkbox" value="shopping" wire:model="types" />
        <span>47</span>
      </li>


      <div>
        <input type="checkbox" value="other" wire:model="showDataLabels" />
        <span>Show data labels</span>
      </div>
  </div> --}}
</div>
