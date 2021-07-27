<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'name' => $faker->company,
            'email' => $faker->unique()->email,
            'logo' => $faker->imageUrl($width = 100, $height = 100),
            'website' => $faker->domainName,
        ];
    }
}
