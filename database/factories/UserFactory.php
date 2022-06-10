<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    static $password;

    public function definition()
    {

//        return [
//            'name' => $this->faker->text(30),
//            'email' => $this->faker->safeEmail(30),
//            'role_id' => Role::factory()->create(),
//            'designation_id' => $this->faker->numberBetween(1, 10),
//            'password' => bcrypt('123456'),
//            'remember_token' => Str::random(10),
//            'status' => 'active',
//        ];
        return [
            'name' => 'Admin',
            'email' => 'admin@example.net',
            'role_id' => 2,
            'designation_id' => $this->faker->numberBetween(1, 10),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'status' => 'active',
        ];
    }
}
