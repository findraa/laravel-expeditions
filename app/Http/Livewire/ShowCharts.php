<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class ShowCharts extends Component
{
    public $types = ['1', '2', '3', '4', '0'];

    public $colors = [
        '1' => '#f6ad55',
        '2' => '#fc8181',
        '3' => '#90cdf4',
        '4' => '#66DA26',
        '0' => '#cbd5e0',
    ];

    public $status_label = [
        '1' => 'Diproses',
        '2' => 'Dikirim',
        '3' => 'Selesai',
        '4' => 'Diterima',
        '0' => 'Other',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function render()
    {
        $expenses = Transaction::with(['details', 'city', 'trackings'])->whereIn('status', $this->types)->get();

        $columnChartModel = $expenses->groupBy('status')
            ->reduce(
                function ($columnChartModel, $data) {
                    $type = $data->first()->status;
                    $value = $data->sum('total');

                    return $columnChartModel->addColumn($this->status_label[$type], $value, $this->colors[$type]);
                },
                LivewireCharts::columnChartModel()
                    ->setTitle('Transaksi')
                    ->setAnimated($this->firstRun)
                    ->withOnColumnClickEventName('onColumnClick')
                    ->setLegendVisibility(false)
                    ->setDataLabelsEnabled($this->showDataLabels)
                    //->setOpacity(0.25)
                    ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                    ->setColumnWidth(90)
                    ->withGrid()
            );

        $pieChartModel = $expenses->groupBy('city_id')
            ->reduce(
                function ($pieChartModel, $data) {
                    $type = $data->first()->city->name;
                    $value = $data->count('city_id');
                    $color[$data->first()->city->name] = '#' . dechex(rand(0x000000, 0xFFFFFF));

                    return $pieChartModel->addSlice($type, $value, $color[$type]);
                },
                LivewireCharts::pieChartModel()
                    //->setTitle('Expenses by Type')
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled($this->showDataLabels)
                // ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        // $lineChartModel = $expenses
        //     ->reduce(
        //         function ($lineChartModel, $data) use ($expenses) {
        //             $index = $expenses->search($data);

        //             $amountSum = $expenses->take($index + 1)->sum('amount');

        //             if ($index == 6) {
        //                 $lineChartModel->addMarker(7, $amountSum);
        //             }

        //             if ($index == 11) {
        //                 $lineChartModel->addMarker(12, $amountSum);
        //             }

        //             return $lineChartModel->addPoint($index, $data->amount, ['id' => $data->id]);
        //         },
        //         LivewireCharts::lineChartModel()
        //             //->setTitle('Expenses Evolution')
        //             ->setAnimated($this->firstRun)
        //             ->withOnPointClickEvent('onPointClick')
        //             ->setSmoothCurve()
        //             ->setXAxisVisible(true)
        //             ->setDataLabelsEnabled($this->showDataLabels)
        //             ->sparklined()
        //     );

        // $areaChartModel = $expenses
        //     ->reduce(
        //         function ($areaChartModel, $data) use ($expenses) {
        //             $index = $expenses->search($data);
        //             return $areaChartModel->addPoint($index, $data->amount, ['id' => $data->id]);
        //         },
        //         LivewireCharts::areaChartModel()
        //             //->setTitle('Expenses Peaks')
        //             ->setAnimated($this->firstRun)
        //             ->setColor('#f6ad55')
        //             ->withOnPointClickEvent('onAreaPointClick')
        //             ->setDataLabelsEnabled($this->showDataLabels)
        //             ->setXAxisVisible(true)
        //             ->sparklined()
        //     );

        // $multiLineChartModel = $expenses
        //     ->reduce(
        //         function ($multiLineChartModel, $data) use ($expenses) {
        //             $index = $expenses->search($data);

        //             return $multiLineChartModel
        //                 ->addSeriesPoint($data->type, $index, $data->amount,  ['id' => $data->id]);
        //         },
        //         LivewireCharts::multiLineChartModel()
        //             //->setTitle('Expenses by Type')
        //             ->setAnimated($this->firstRun)
        //             ->withOnPointClickEvent('onPointClick')
        //             ->setSmoothCurve()
        //             ->multiLine()
        //             ->setDataLabelsEnabled($this->showDataLabels)
        //             ->sparklined()
        //             ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
        //     );

        // $multiColumnChartModel = $expenses->groupBy('type')
        //     ->reduce(
        //         function ($multiColumnChartModel, $data) {
        //             $type = $data->first()->type;

        //             return $multiColumnChartModel
        //                 ->addSeriesColumn($type, 1, $data->sum('amount'));
        //         },
        //         LivewireCharts::multiColumnChartModel()
        //             ->setAnimated($this->firstRun)
        //             ->setDataLabelsEnabled($this->showDataLabels)
        //             ->withOnColumnClickEventName('onColumnClick')
        //             ->setTitle('Revenue per Year (K)')
        //             ->stacked()
        //             ->withGrid()
        //     );

        $this->firstRun = false;

        return view('livewire.show-charts')
            ->with([
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                // 'lineChartModel' => $lineChartModel,
                // 'areaChartModel' => $areaChartModel,
                // 'multiLineChartModel' => $multiLineChartModel,
                // 'multiColumnChartModel' => $multiColumnChartModel,
            ]);
    }
}
