<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysName extends Model
{
    use HasFactory;

    protected $table = 'days_name';
        protected $primarykey = 'id';
   protected $fillable = [
       'day_name','days_id',
   ];
   public function datedays()
   {
       return $this->hasMany(Dateday::class, 'days_id', 'id');
   }

}
