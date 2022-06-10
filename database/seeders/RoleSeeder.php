<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use File;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/roles.json");
        $data = json_decode($json, true);
        Role::insert($data);
//        Role::factory()->count(10)->create();
    }
}
