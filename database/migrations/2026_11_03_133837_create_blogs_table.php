<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Author
            |--------------------------------------------------------------------------
            */

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('last_edited_by_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            $table->string('title', 255);

            $table->string('subtitle', 300)->nullable();

            $table->string('slug', 180)->unique();

            $table->text('excerpt')->nullable();

            $table->string('locale', 10)->default('fa-IR');

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->longText('content');

            $table->string('content_format', 20)->default('markdown');

            $table->json('table_of_contents')->nullable();

            $table->unsignedInteger('word_count')->default(0);

            $table->unsignedSmallInteger('reading_time_minutes')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Featured Image
            |--------------------------------------------------------------------------
            */

            $table->string('thumbnail')->nullable();

            $table->string('thumbnail_alt')->nullable();

            $table->string('thumbnail_caption')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Publishing
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_published')->default(false);

            $table->boolean('is_featured')->default(false);

            $table->boolean('is_pinned')->default(false);

            $table->boolean('allow_comments')->default(false);

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            $table->string('seo_title', 70)->nullable();

            $table->string('seo_description', 320)->nullable();

            $table->string('canonical_url')->nullable();

            $table->string('robots', 50)->default('index,follow');

            $table->string('og_image')->nullable();

            $table->json('seo_schema')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Statistics
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('views_count')->default(0);

            $table->unsignedBigInteger('likes_count')->default(0);

            /*
            |--------------------------------------------------------------------------
            | Additional Metadata
            |--------------------------------------------------------------------------
            */

            $table->json('metadata')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Timestamps & Soft Deletes
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            $table->softDeletes();

            /*
            |--------------------------------------------------------------------------
            | Indexes
            |--------------------------------------------------------------------------
            */

            $table->index('is_published');

            $table->index('is_featured');

            $table->index('is_pinned');

            $table->index('locale');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};