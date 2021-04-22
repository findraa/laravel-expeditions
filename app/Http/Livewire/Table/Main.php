<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage = 5;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'expedition':
                $expeditions = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.expedition',
                    "expeditions" => $expeditions,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('expedition.new'),
                            'create_new_text' => 'Buat Ekspedisi Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'area':
                $areas = $this->model::search($this->search)
                    ->with('expedition')
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.area',
                    "areas" => $areas,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('area.new'),
                            'create_new_text' => 'Buat Area Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'message':
                $messages = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.message',
                    "messages" => $messages,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => 'Pesan',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'transaction':
                $transactions = $this->model::search($this->search)
                    ->with('city')
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.transaction',
                    "transactions" => $transactions,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('transaction.new'),
                            'create_new_text' => 'Buat Transaksi',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'tracking':
                $trackings = $this->model::search($this->search)
                    ->with('city', 'city.province')
                    ->where('user_id', auth()->user()->id)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.tracking',
                    "trackings" => $trackings,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('tracking.new'),
                            'create_new_text' => 'Data Tracking',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'transaction-report':
                $transactionReports = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.report-transaction',
                    "transactionReports" => $transactionReports,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('transaction.new'),
                            'create_new_text' => 'Transaksi',
                            'export' => route('report.transaction_pdf'),
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'expedition-report':
                $expeditionReports = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.report-expedition',
                    "expeditionReports" => $expeditionReports,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('transaction.new'),
                            'create_new_text' => 'Transaksi',
                            'export' => route('report.expedition_pdf'),
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function updateItem($id)
    {
        $transaction = Transaction::where('id', $id)->first();

        if($transaction->status == '0')
        {
            $transaction->update(['status' => 1, 'process_at' => now()]);

        }
        else if($transaction->status == '1')
        {
            $transaction->update(['status' => 2, 'shipping_at' => now()]);
        }
        else if($transaction->status == '2')
        {
            $transaction->update(['status' => 3, 'finish_at' => now()]);
        }
        else
        {
            $transaction->update(['status' => 4, 'accepted_at' => now()]);

        }
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
