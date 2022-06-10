<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Dev Admin',
<<<<<<< HEAD
            'email' => 'dev@bluebees4u.test',
=======
            'email' => 'dev@bluebees4u.com',
>>>>>>> 73281c066c3c9d84e6250446a96ffa063d92de2a
            'role_id' => 1,
            'designation_id' => 1,
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'status' => 'active',
        ];
    }
}
