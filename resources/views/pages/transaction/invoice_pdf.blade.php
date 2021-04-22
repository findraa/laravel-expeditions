<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice #{{ $transaction->tracking_number }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
  .invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
  }

  .invoice-box table {
    width: 100%;
    line-height: normal;
    /* inherit */
    text-align: left;
  }

  .invoice-box table td {
    padding: 5px;
    vertical-align: top;
  }

  .invoice-box table tr td:nth-child(2) {
    text-align: right;
  }

  .invoice-box table tr.top table td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.top table td.title {
    font-size: 25px;
    line-height: 25px;
    color: #333;
  }

  .invoice-box table tr.information table td {
    padding-bottom: 40px;
  }

  .invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
  }

  .invoice-box table tr.details td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
  }

  .invoice-box table tr.item.last td {
    border-bottom: none;
  }

  .invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    margin-top: 10px;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
    }

    .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
    }
  }

  /** RTL **/
  .rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  }

  .rtl table {
    text-align: right;
  }

  .rtl table tr td:nth-child(2) {
    text-align: left;
  }
</style>
<body>

  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="4">
          <table>
            <tr>
              <td class="title">
                <p>Anugrah Indah</p>
              </td>

              <td>
                No. Pesanan : <strong>#{{ $transaction->id }}</strong><br>
                No. Tracking : <strong>#{{ $transaction->tracking_number }}</strong><br>
                {{ $transaction->created_at }}<br>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="4">
          <table>
            <tr>
              <td>
                <strong>PENERIMA</strong><br>
                {{ $transaction->reciver_name }}<br>
                {{ $transaction->reciver_phone }}<br>
                {{ $transaction->reciver_address }}<br>
                {{ $transaction->city->name }}, {{ $transaction->city->postal_code }}<br>
                {{ $transaction->city->province->name }}
              </td>

              <td>
                <strong>PENGIRIM</strong><br>
                {{ $transaction->sender_name }}<br>
                {{ $transaction->sender_phone }}<br>
                {{ $transaction->sender_address }}<br>
                Kota Makassar<br>
                Sulawesi Selatan
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="heading">
        <td>Nama Barang</td>
        <td>Qty</td>
        <td>Berat</td>
        <td>Subtotal</td>
      </tr>

      @foreach ($transaction->details as $row)
      <tr class="item">
        <td>{{ $row->item_name }}</td>
        <td>{{ $row->qty }}</td>
        <td>{{ $row->weight }} {{ $row->area->weight }}</td>
        <td>Rp. {{ number_format($row->subtotal) }}</td>
      </tr>
      @endforeach

      <tr class="total">
        <td></td>
        <td></td>
        <td></td>
        <td colspan=4>
          Total: Rp {{ number_format($transaction->total) }}
        </td>
      </tr>

      <tr>
        <td><strong>QR-Code Transaksi</strong></td>
        <td></td>
      </tr>
      <tr>
        <td><img src="data:image/png;base64, {!! $transaction->getQrcode($transaction->id) !!} ">
        </td>
        <td></td>
      </tr>
    </table>
  </div>

  {{-- <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script> --}}
</body>
</html>
