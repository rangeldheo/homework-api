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


    public function index()
    {
        return response()->json([
            'data' => [
                'total_vendas' => Sale::onCurrentDate()->sum('value')
            ]
        ]);
    }
}
