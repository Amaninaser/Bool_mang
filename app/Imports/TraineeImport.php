<?php

namespace App\Imports;

use App\Models\Trainee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TraineeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Trainee([
            'firstname'=> $row['firstname'],
            'lastname'=> $row['lastname'],
            'town'=> $row['lastname'],
            'no_id'=> $row['no_id'],
            'phone'=> $row['phone'],
            'parent_phone'=> $row['parent_phone'],         
        ]);
    }
}
