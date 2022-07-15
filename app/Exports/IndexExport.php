<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndexExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
  
    public function __construct($data)
    {
        $this->data = $data;
    }
  
    public function collection()
    {
        return collect($this->data);
    }
    public function headings() :array
    {
        return [
            'Datetime',
            'Plat',
            'SimCard',
            'IMEI',
            'Customer',
            'ACC',
            'Battery',
            'Signal Strength',
            'GPS Type',
            'Port Server',
            'Port Server Live',
        ];
    }
}
