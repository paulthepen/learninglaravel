<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            //overriding the name of the column so it doesn't conflict with job table
            $table->foreignIdFor(App\Models\Job::class, 'job_listing_id') -> constrained() -> cascadeOnDelete();
            //constrain the foreign key and delete the pivot record if job or tag is deleted
            $table->foreignIdFor(App\Models\Tag::class) -> constrained() -> cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
