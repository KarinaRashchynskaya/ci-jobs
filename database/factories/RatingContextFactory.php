<?php

namespace Ci\Jobs\Database\Factories;

use Ci\Jobs\Models\RatingContext;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RatingContext>
 */
class RatingContextFactory extends Factory
{
    protected $model = RatingContext::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'enforce_unique_ratings' => $this->faker->boolean(),
        ];
    }
}
