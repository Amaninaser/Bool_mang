<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Time;


class Trainer extends Model
{
    use HasFactory;
    protected $perPage = 6;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
       
    ];
    

	public function datedays()
	{
		return $this->hasMany(Dateday::class);
	}
    public function trainee()
    {
        return $this->hasMany(Trainee::class, 'trainer_id', 'id');
    }
    
	


    public static function validateRoles()
    {
        return [
            'firstname' => 'required|min:2|max:32',
            'lastname' => 'required|min:2|max:32',
            'phone' => 'required|min:10|max:24|regex:/^[0-9\-\+\.\s\(\)x]+$/',
          
        ];
    }
   protected $guarded = [];

	

}
