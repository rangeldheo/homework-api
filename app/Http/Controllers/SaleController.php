<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Models\Sale;

class SaleController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesRequest $request)
    {
        $sale = Sale::create($request->all());
        return response()->json([
            'data' => [
                'venda' => Sale::with('vendedor')->find($sale->id)
            ]
        ]);
    }

    /**
     * Retorna o resultado da soma das vendas do dia atual
     *
     * @return void
     */
    public function index()
    {
        return response()->json([
            'data' => [
                'total_vendas' => number_format(
                    Sale::onCurrentDate()->sum('value'),
                    2,
                    ',',
                    '.'
                )
            ]
        ]);
    }
}
