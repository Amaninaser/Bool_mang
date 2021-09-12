<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $perPage = 6;

    protected $fillable = [
      
        'trainer_id',
        'trainee_id',
        'Time_from',
        'Time_To',
        'date_id',
        'status',
        'color',
        'audience',
        'text_color',
        'deatils',
    ];
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }
    public function trainee()
    {
        return $this->belongsTo(Trainee::class, 'trainee_id', 'id');
    }
}

