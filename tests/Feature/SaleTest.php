<?php

namespace Tests\Feature;

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    /** @test */
    public function checar_soma_das_vendas()
    {
       $sale = Sale::onCurrentDate()->get();
       dd($sale);
    }
}
