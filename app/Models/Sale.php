<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'salesmen_id',
        'value',
        'on_date'
    ];

    public function vendedor(){
        return $this->belongsTo(Salesman::class,'salesmen_id');
    }
}
