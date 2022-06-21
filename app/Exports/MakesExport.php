<?php

namespace App\Exports;

use App\Models\Make;
use Maatwebsite\Excel\Concerns\FromCollection;

class MakesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Make::all();
    }
}
