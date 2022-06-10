<?php

namespace Database\Factories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    static $password;

    public function definition()
    {
        return [
            'site_title' => 'Dhaka Ice-Creame Ltd.',
            'site_author' => $this->faker->text(30),
            'author_email' => $this->faker->safeEmail(30),
            //'logo' => $faker->image($filepath, '150', '150', null, false),
            'logo' => 'logo.png',
        ];
    }
}
