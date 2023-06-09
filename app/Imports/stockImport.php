<?php

namespace App\Imports;

use App\Models\User;
use App\Models\stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class stockImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $stock = new stock([
            "variant" => $row['variant'],
            "stock" => $row['stock'],
          
        ]);

       
        return $stock;
    }
}
