<?php

namespace Database\Factories;

use App\Models\Designation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DesignationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Designation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    static $password;

    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'sequence' => $this->faker->randomDigitNotNull(),
            'status' => 'active',
        ];
    }
}
