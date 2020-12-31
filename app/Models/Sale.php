<?php

namespace App\Models;

use App\Utils\Special;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * O Correto é essa constante COMISSAO ser armazenada na base de dados
     * de forma que seja administrada pelo usuário admin do sistema
     */
    public const COMISSAO = 8.5;

    protected $fillable = [
        'salesmen_id',
        'value',
        'on_date'
    ];

    protected $casts = [
        'on_date'    => 'datetime:d/m/Y H:i',
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];

    protected $appends = [
        'comissao',
        'valor_venda'
    ];

    /**
     * Calcula comissao usando o atributo VALUE como fator e
     * a constante da classe Sale::COMISSAO como multiplicador
     * e o produto é dividido por 100 para obtermos o valor requerido
     * ======================================================================
     * |  NOTA: a divisão por 100 é necessária uma vez que optei por escrever
     * | o valor da comissao em percentual 8.5 ao invés de 0.085
     * ======================================================================
     * @return void
     */
    public function getComissaoAttribute()
    {
        $comissao =  ($this->value * Sale::COMISSAO) / 100;
        return number_format($comissao, 2, ',', '.');
    }

    public function getValorVendaAttribute()
    {
        return 'R$' . number_format($this->value, 2, ',', '.');
    }

    public function vendedor()
    {
        return $this->belongsTo(Salesman::class, 'salesmen_id');
    }

    public function scopeOnCurrentDate($query)
    {
        $carbon = Carbon::now();
        $from   = $carbon->format('Y-m-d') . Special::SPACE . '00:00:00';
        $to     = $carbon->format('Y-m-d') . Special::SPACE . '23:59:59';
        return $query->whereBetween('on_date', [$from, $to]);
    }
}
