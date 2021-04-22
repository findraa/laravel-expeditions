<x-app-layout>
  <x-slot name="header_content">
    <h1>Detail Transaksi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
      <div class="breadcrumb-item"><a href="#">Invoice</a></div>
      {{-- <div class="breadcrumb-item">Default Layout</div> --}}
    </div>
  </x-slot>

  <div class="row">
    <div class="col-12">
      <!-- Main content -->
      <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fas fa-globe"></i> Ekspedisi Anugrah Indah.
              <small class="float-right">Tanggal: {{ $transaction->created_at->format('d/m/Y') }}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <br>Pengirim:
            <address>
              <strong>{{ ucfirst($transaction->sender_name) }}.</strong><br>
              {{ Str::upper($transaction->sender_address) }}<br>
              Makassar, Sulawesi-Selatan. <br>
              No. Telp: {{ $transaction->sender_phone }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <br>Penerima:
            <address>
              <strong>{{ ucfirst($transaction->reciver_name) }}.</strong><br>
              {{ Str::upper($transaction->reciver_address) }} <br>
              {{ $transaction->city->name}},
              {{ $transaction->city->postal_code }}.
              {{ $transaction->city->province->name }}. <br>
              No. Telp: {{ $transaction->reciver_phone }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Tracking #{{ $transaction->tracking_number }}</b><br>
            <br>
            <b>No. Pengiriman:</b> {{ $transaction->id }}<br>
            <b>Tanggal:</b> {{ $transaction->created_at->format('d M Y H:i') }}<br>
            <b>Status:</b> Dikonfirmasi<br>
            <b>Kurir:</b> {{ $transaction->user->name }} <br>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Berat</th>
                  {{-- <th>Area</th> --}}
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transaction->details as $row)
                <tr>
                  <td>{{ $row->item_name }}</td>
                  <td>{{ $row->qty }}</td>
                  <td>{{ $row->weight }} {{ $row->area->weight }}</td>
                  {{-- <td>{{ $row->area->destination }}</td> --}}
                  <td>Rp. {{ number_format($row->subtotal) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <p class="lead">QR Code Transaksi:</p>

            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
              <td><img src="data:image/png;base64, {!! $transaction->getQrcode($transaction->id) !!} ">
            </p>
          </div>
          <!-- /.col -->
          <div class="col-6">
            {{-- <p class="lead">Status {!! $transaction->status_label !!}</p> --}}

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>Rp. {{ number_format($transaction->total) }}</td>
                </tr>
                {{-- <tr>
                  <th>Tax (9.3%)</th>
                  <td>Rp. {{ number_format((($total-$price)/$price)*100) }}</td>
                </tr> --}}
                <tr>
                  <th>Potongan:</th>
                  <td>-</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>Rp. {{ number_format($transaction->total) }}</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-12">
            {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Kirim
            </button> --}}
            <a type="button" href="{{ route('invoice.print', $transaction->id) }}" target="_blank"
              class="btn btn-primary float-right" style="margin-right: 5px;">
              <i class="fas fa-download"></i> Print
            </a>
          </div>
        </div>
      </div>
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div><!-- /.row -->

</x-app-layout>
