<?php

use App\Models\Salesman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SalesmanSeeder::class,
            SaleSeeder::class
        ]);
    }
}
