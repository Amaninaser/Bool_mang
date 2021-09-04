<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;
    protected $perPage = 6;

    protected $fillable = [
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
    public function trainers()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }

    public function finance()
    {
        return $this->belongsTo(Finance::class, 'trainee_id', 'id');
    }
    
    public static function validateRoles()
    {
        return [
            'firstname' => 'required|min:2|max:32|regex:/^[A-z\-\.' . "\'" . ' ]+$/',
            'lastname' => 'required|min:2|max:32|regex:/^[A-z\-\.' . "\'" . ' ]+$/',
            'phone' => 'required|min:10|max:24|regex:/^[0-9\-\+\.\s\(\)x]+$/',
    
            'Subtype' => [
                'required',
                'in:تدرييب,درس خصوصي,تعليم'
            ],
            'town' => [
                'required',
            ],
            'no_id' => [
                'required',
            ],
            'parent_phone' =>  'required|min:10|max:24|regex:/^[0-9\-\+\.\s\(\)x]+$/',
            'trainer_id' => 'nullable',
           
        ];
    }
}
