<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = ['Seo Paketi','Adwors Paketi','Slug Paketi','Ödeme Yöntem Paketi'];
        return [
            'name'          => $this->faker->randomElement($array)."-".$this->faker->randomElement([1,2,3]),
            'description'   => $this->faker->text(),
            'status'        => 1,
        ];
    }
}
