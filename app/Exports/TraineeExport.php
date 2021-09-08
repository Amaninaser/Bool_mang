<?php

namespace App\Exports;

use App\Models\Trainee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TraineeExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'id',
            'firstname',
            'lastname',
            'town',
            'no_id',
            'phone',
            'parent_phone',
            'trainer_id',
            'Subtype',
            'number_of_lessons',
            'lesson_price',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Trainee::getTrainee());
    }
}
