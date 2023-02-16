<?php

namespace App\Imports;

use App\Models\Solution;
use Maatwebsite\Excel\Concerns\ToModel;

class SolutionsImport implements ToModel
{
    public function model(array $row)
    {
        return new Solution([
            'id' =>2013,
            'qcmliste_id' => 2,
            'A' => 1,
            'B' => 0,
            'C' => 1,
            'D' => 0,
            'E' => 1,
        ]);
    }
}
