<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Time;


class Dateday extends Model
{
    use HasFactory;
    protected $perPage = 6;

    protected $fillable = [
      
        'date_from',
        'date_to',
        'trainer_id',
        'start_time',
        'end_time'
    
    ];
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }
    public function daysname()
    {
        return $this->hasMany(DaysName::class, 'days_id', 'id');
    }
  
    protected $guarded = [];

    public static function validateRoles()
    {
        return [
            'date_from' => 'required',
            'date_to' => 'required',
            'trainer_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
    }

}
