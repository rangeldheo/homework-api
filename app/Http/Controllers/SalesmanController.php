<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesmanRequest;
use App\Models\Salesman;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data'=>[
                'vendedores'=> Salesman::paginate(10)
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesmanRequest $request)
    {
        return response()->json([
            'data'=> [
                'vendedor'=>Salesman::create($request->all())
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salesman  $salesman
     * @return \Illuminate\Http\Response
     */
    public function show(Salesman $salesman)
    {
        return response()->json([
            'data'=> [
                'vendedores'=>Salesman::with('vendas')
                ->find($salesman->id)
            ]
        ]);
    }
}
