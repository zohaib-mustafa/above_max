<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
     protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'logo' => 'VGGrM4jF0y7EBMQRTkNM5i7S6qzz8H33STpQL8ty.jpg',
            'website' => $this->faker->url,
        ];
    }
}
