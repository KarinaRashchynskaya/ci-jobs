<?php

namespace Ci\Jobs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ci\Jobs\Database\Factories\RatingContextFactory;

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
