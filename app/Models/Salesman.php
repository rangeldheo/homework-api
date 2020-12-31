<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * Retorna as vendas do vendedor
     */

    public function vendas(){
        return $this->hasMany(Sale::class,'salesmen_id');
    }
}
