<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('salesmen_id')
                ->references('id')
                ->on('salesmen')
                ->onDelete('cascade');

            $table->decimal('value',16,2)->default(0)->comment('Valor da venda');
            $table->timestamp('on_date')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data de quando ocorreu a venda');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
