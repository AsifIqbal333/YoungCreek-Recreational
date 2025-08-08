<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToArray, WithHeadingRow
{
    public function array(array $array)
    {
        // The $array variable contains all rows of the CSV with header keys.
        return $array;
    }
}
