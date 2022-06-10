<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    static $password;

    public function definition()
    {
        return [
            'name' => $this->faker->text(30),
            'description' => $this->faker->text(100),
            'status' => 'active',
        ];
    }
}
