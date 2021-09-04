<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $fillable = [
        'paid_money',
        'owed_money',
        'trainee_id',
        
    ];
    
    public static function validateRoles()
    {
        return [
            'paid_money' => 'required',
            'owed_money' => 'required',
            'trainee_id' => 'required',
        ];
    }
    public function trainee()
    {
        return $this->belongsTo(Trainee::class, 'trainee_id', 'id');
    }
}
