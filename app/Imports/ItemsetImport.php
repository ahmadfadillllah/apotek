<?php

namespace App\Imports;

use App\Models\Itemset;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Itemset([
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]),
            'item' => $row[1],
        ]);
    }
}
