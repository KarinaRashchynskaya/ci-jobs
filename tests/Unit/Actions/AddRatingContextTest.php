<?php

namespace Actions;

use Ci\Jobs\Actions\AddRatingContext;

use Ci\Jobs\Models\RatingContext;
use Ci\Jobs\Tests\BaseTestCase;
use Illuminate\Validation\ValidationException;

class AddRatingContextTest extends BaseTestCase
{
    public function test_add_a_rating_context(): void
    {
        $data = RatingContext::factory()->makeOne();
        $action = $this->app->make(AddRatingContext::class);

        $result = $action->run($data->toArray());

        $this->assertInstanceOf(RatingContext::class, $result);
        $this->assertEquals($result->name, $data->name);
    }

    public function test_can_not_add_rating_context_with_the_same_name(): void
    {
        $data = RatingContext::factory()->makeOne();
        $action = $this->app->make(AddRatingContext::class);

        $action->run($data->toArray());

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('The name has already been taken.');

        $action->run($data->toArray());
    }

    public function test_name_is_required(): void
    {
        $this->expectException(ValidationException::class);

        $this->expectExceptionMessage('The name field is required.');

        $addRatingContextAction = $this->app->make(AddRatingContext::class);

        $addRatingContextAction->run([]);
    }

    public function test_name_is_required_no2(): void
    {
        $this->expectException(ValidationException::class);

        $this->expectExceptionMessage('The name field is required.');

        $addRatingContextAction = $this->app->make(AddRatingContext::class);

        $addRatingContextAction->run(['name' => '']);
    }

    public function test_default_state_of_enforce_unique_ratings(): void
    {
        $addRatingContextAction = $this->app->make(AddRatingContext::class);
        $result = $addRatingContextAction->run(['name' => 'Foo']);

        $this->assertInstanceOf(RatingContext::class, $result);
        $this->assertEquals(1, $result->enforce_unique_ratings);
    }
}
