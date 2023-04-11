<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ci\Jobs\Models\RatingContext;
use Ci\Jobs\PackageProvider;

return new class extends Migration {
    protected $connection = PackageProvider::CONNECTION;

    public function up(): void
    {
        Schema::create((new RatingContext())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('enforce_unique_ratings')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists((new RatingContext())->getTable());
    }
};
