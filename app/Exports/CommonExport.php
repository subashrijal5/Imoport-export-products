<?php
namespace App\Exports;

use App\Models\Equipment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromView;

class CommonExport implements FromView
{
    public function __construct($model, $viewname = 'exports.common', $table = 'clients')
    {
        $this->model = '\\App\\Models\\' . $model;
        $this->title = $model;
        $this->view = $viewname;
        $this->columns = $this->getColumnNames($table);
    }

    public function view(): View
    {
        return view($this->view, [
            'datas' => $this->model::get($this->columns)->toArray(),
            'title' => $this->title,
            'columns' => $this->columns
        ]);
    }

    public function getColumnNames($table)
    {
        return Schema::getColumnListing($table);
    }
}
