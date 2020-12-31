<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];

    protected $appends = [
        'comissao'
    ];

    /**
     * Retorna as vendas do vendedor
     */

    public function vendas()
    {
        return $this->hasMany(Sale::class, 'salesmen_id');
    }

    /**
     * Calcula todas as comissoes do vendedor
     *
     * @return void
     */
    public function getComissaoAttribute()
    {
        $sales =  Sale::where('salesmen_id', $this->id)->sum('value') * Sale::COMISSAO;
        if ($sales > 0) {
            return number_format($sales / 100, 2, ',','.');
        }
        return 0.00;
    }
}
