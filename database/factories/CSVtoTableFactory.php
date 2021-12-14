<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CSVtoTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'usec' => $this->faker->usec,
            'SourceIP' => $this->faker->SourceIP,
            'SourcePort' => $this->faker->SourcePort,
            'DestinationIP' => $this->faker->DestinationIP,
            'DestinationPort' => $this->faker->DestinationPort,
            'FQDN' => $this->faker->FQDN,
        ];
    }
}
