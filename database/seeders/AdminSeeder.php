<?php

namespace Database\Seeders;

use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return (AdminFactory::new ())->create();
    }
}
