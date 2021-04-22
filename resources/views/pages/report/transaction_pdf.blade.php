<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Transaksi PDF</title>
  {{-- <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon"> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">
            <div class="row">
              <div class="col-lg-12">
                <p class="invoice-number text-right">Tanggal Cetak: @php
                  echo date('d M Y')
                  @endphp</p>
                <div class="invoice-title text-center">
                  <h3>Laporan Transaksi</h3>
                  <hr>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <thead>
                      <tr>
                        <th data-width="50">#</th>
                        <th>Pelanggan</th>
                        <th class="text-center">No. Transaksi</th>
                        <th class="text-center">Tanggal</th>
                        <th data-width="100" class="text-right">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $total = 0; @endphp
                      @forelse ($transactions as $row)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->sender_name }}<br>
                          Telp: {{ $row->sender_phone }}<br>
                          Alamat: {{ $row->sender_address }}</td>
                        <td class="text-center">{{ $row->id }}</td>
                        <td class="text-center">{{ $row->created_at->format('d-m-Y') }}</td>
                        <td class="text-right">Rp. {{ number_format($row->total) }}</td>
                      </tr>
                      @php $total += $row->total @endphp
                      @empty
                      <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                      </tr>
                      @endforelse
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4" class="text-left"><strong>Total</strong></td>
                        <td class="text-right"><strong>Rp. {{ number_format($total) }}</strong></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                {{-- <div class="row mt-4">
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Subtotal</div>
                      <div class="invoice-detail-value">$670.99</div>
                    </div>
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Shipping</div>
                      <div class="invoice-detail-value">$15</div>
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total</div>
                      <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
</html>
