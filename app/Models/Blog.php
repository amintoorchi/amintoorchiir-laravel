<?php

namespace App\Models;

use Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $user_id
 * @property int|null $last_edited_by_id
 * @property string $title
 * @property string|null $subtitle
 * @property string $slug
 * @property string|null $excerpt
 * @property string $locale
 * @property string $content
 * @property string $content_format
 * @property array|null $table_of_contents
 * @property int $word_count
 * @property int|null $reading_time_minutes
 * @property string|null $thumbnail
 * @property string|null $thumbnail_alt
 * @property string|null $thumbnail_caption
 * @property bool $is_published
 * @property bool $is_featured
 * @property bool $is_pinned
 * @property bool $allow_comments
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $canonical_url
 * @property string|null $robots
 * @property string|null $og_image
 * @property array|null $seo_schema
 * @property int $views_count
 * @property int $likes_count
 * @property array|null $metadata
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
#[Fillable([
    'user_id',
    'last_edited_by_id',
    'title',
    'subtitle',
    'slug',
    'excerpt',
    'locale',
    'content',
    'content_format',
    'table_of_contents',
    'word_count',
    'reading_time_minutes',
    'thumbnail',
    'thumbnail_alt',
    'thumbnail_caption',
    'is_published',
    'is_featured',
    'is_pinned',
    'allow_comments',
    'seo_title',
    'seo_description',
    'canonical_url',
    'robots',
    'og_image',
    'seo_schema',
    'metadata',
])]
class Blog extends Model
{
    /** @use HasFactory<BlogFactory> */
    use HasFactory, SoftDeletes;

    /**
     * Get the author of the blog.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user who last edited the blog.
     */
    public function lastEditedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'last_edited_by_id');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'table_of_contents' => 'array',
            'seo_schema' => 'array',
            'metadata' => 'array',

            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'is_pinned' => 'boolean',
            'allow_comments' => 'boolean',

            'word_count' => 'integer',
            'reading_time_minutes' => 'integer',
            'views_count' => 'integer',
            'likes_count' => 'integer',
        ];
    }

    /**
     * Scope a query to only include published blogs.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to only include featured blogs.
     */
    public function scopeFeatured(Builder $query): void
    {
        $query->where('is_featured', true);
    }

    /**
     * Scope a query to only include pinned blogs.
     */
    public function scopePinned(Builder $query): void
    {
        $query->where('is_pinned', true);
    }

    /**
     * Scope a query to only include blogs with comments enabled.
     */
    public function scopeCommentable(Builder $query): void
    {
        $query->where('allow_comments', true);
    }
}
