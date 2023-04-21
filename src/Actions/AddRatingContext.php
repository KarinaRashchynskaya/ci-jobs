<?php

namespace Ci\Jobs\Actions;

use Ci\Jobs\Models\RatingContext;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Add a rating context.
 *
 * Steps:
 * * validate
 *  * Name is required
 * * add rating context
 */
class AddRatingContext
{
    public const INPUT = [
        'name' => 'string',
        'enforce_unique_ratings' => 'boolean',
    ];

    public function run(#[ArrayShape(self::INPUT)] array $input): RatingContext
    {
        $input = array_intersect_key($input, self::INPUT);
        Validator::validate($input, $this->getRules());

        $ratingContext = RatingContext::query()->create($input);

        return $ratingContext->refresh();
    }

    protected function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                (new Unique(RatingContext::class)),
            ],
            'enforce_unique_ratings' => [
                'boolean',
                'sometimes',
            ],
        ];
    }
}
