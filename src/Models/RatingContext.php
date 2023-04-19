<?php

namespace Ci\Jobs\Models;

use Ci\Jobs\Database\Factories\RatingContextFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperRatingContext
 */
class RatingContext extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'enforce_unique_ratings',
    ];

    protected static function newFactory(): RatingContextFactory
    {
        return RatingContextFactory::new();
    }
}
