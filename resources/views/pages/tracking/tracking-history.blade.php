<x-app-layout>
  <x-slot name="header_content">
    <h1>Data Tracking</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Home</a></div>
      <div class="breadcrumb-item"><a href="#">Data Tracking</a></div>
      {{-- <div class="breadcrumb-item">Default Layout</div> --}}
    </div>
  </x-slot>

  <div class="section-body">
    <h2 class="section-title">No. Tracking #{{ $transaction->tracking_number }} - Tujuan {{ $transaction->city->name }}
    </h2>
    <div class="row">
      <div class="col-12">
        <div class="activities">

          @if (!is_null($transaction->accepted_at))
          <div class="activity">
            <div class="text-white activity-icon bg-primary shadow-primary">
              <i class="fas fa-check"></i>
            </div>
            <div class="activity-detail">
              <div class="mb-2">
                <span class="bullet"></span>
                <span class="text-job text-primary">{{ $transaction->accepted_at->format('d M H:i') }}</span>
                <div class="float-right dropdown">
                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-title">Options</div>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"
                      data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                      data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Hapus</a>
                  </div>
                </div>
              </div>
              <p>Pesanan telah diterima oleh {{ $transaction->reciver_name }}".</p>
            </div>
          </div>
          @endif

          @if (!is_null($transaction->finish_at))
          <div class="activity">
            <div class="text-white activity-icon bg-primary shadow-primary">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="activity-detail">
              <div class="mb-2">
                <span class="bullet"></span>
                <span class="text-job text-primary">{{ $transaction->finish_at->format('d M H:i') }}</span>
                <div class="float-right dropdown">
                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-title">Options</div>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"
                      data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                      data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Hapus</a>
                  </div>
                </div>
              </div>
              <p>Pesanan telah sampai di drop point {{ $transaction->city->name }}.</p>
            </div>
          </div>
          @endif

          @foreach ($transaction->trackings as $row)
          <div class="activity">
            <div class="text-white activity-icon bg-primary shadow-primary">
              <i class="fas fa-shipping-fast"></i>
            </div>
            <div class="activity-detail">
              <div class="mb-2">
                <span class="bullet"></span>
                <span class="text-job text-primary">{{ $row->created_at->format('d M H:i') }}</span>
                <div class="float-right dropdown">
                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu" x-data="window.__controller.dataTableController({{ $row->id }})">
                    <div class="dropdown-title">Options</div>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger" x-on:click.prevent="deleteItem"><i
                        class="fas fa-trash-alt"></i>
                      Hapus</a>
                  </div>
                </div>
              </div>
              <p><span class="text-job text-primary">[{{ $row->city->name }}]</span> Pesanan sedang berada dalam
                perjalanan.</p>
            </div>
          </div>
          @endforeach

          @if (!is_null($transaction->shipping_at))
          <div class="activity">
            <div class="text-white activity-icon bg-primary shadow-primary">
              <i class="fas fa-truck"></i>
            </div>
            <div class="activity-detail">
              <div class="mb-2">
                <span class="bullet"></span>
                <span class="text-job text-primary">{{ $transaction->shipping_at->format('d M H:i') }}</span>
                @if (auth()->user()->role == '0')
                <div class="float-right dropdown">
                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-title">Options</div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"
                      data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                      data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Hapus</a>
                  </div>
                </div>
                @endif
              </div>
              <p><span class="text-job text-primary">[Makassar]</span> Pesanan telah keluar dari gudang.</p>
            </div>
          </div>
          @endif

          @if (!is_null($transaction->process_at))
          <div class="activity">
            <div class="text-white activity-icon bg-primary shadow-primary">
              <i class="fas fa-truck-loading"></i>
            </div>
            <div class="activity-detail">
              <div class="mb-2">
                <span class="bullet"></span>
                <span class="text-job text-primary">{{ $transaction->process_at->format('d M H:i') }}</span>
                @if (auth()->user()->role == '0')
                <div class="float-right dropdown">
                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-title">Options</div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"
                      data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                      data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Hapus</a>
                  </div>
                </div>
                @endif
              </div>
              <p>Pesanan telah diproses dan akan segera di serahkan ke kurir.</p>
            </div>
          </div>
          @endif

          <div class="activity">
            <div class="text-white activity-icon bg-primary shadow-primary">
              <i class="fas fa-box"></i>
            </div>
            <div class="activity-detail">
              <div class="mb-2">
                <span class="bullet"></span>
                <span class="text-job text-primary">{{ $transaction->created_at->format('d M H:i') }}</span>
                @if (auth()->user()->role == '0')
                <div class="float-right dropdown">
                  <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-title">Options</div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"
                      data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                      data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Hapus</a>
                  </div>
                </div>
                @endif
              </div>
              <p>Pesanan telah diterima dan akan segera di proses.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
