<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $appends = ['reading_time'];
    protected $cats = [
        'tags' => 'array'
    ];
    protected $with = ['categories', 'user'];

    public function readingTime(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getReadTime($this->body)
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Post\Category::class, 'post_category');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSiblings(int $count = 2): object
    {
        $currentPostId = $this->id;
        $siblings = Post::whereNot('id', $this->id)->where('id', $currentPostId - 1)->orWhere('id', $currentPostId + 1)->limit($count)->get();
        return $siblings;
    }

    /* Calculate the estimated reading time for a given piece of $content.
    *
    * @param string $content Content to calculate read time for.
    * @param int $wpm Estimated words per minute of reader.
    *
    * @returns  string $time Estimated reading time.
    */
    public function getReadTime(string $allcontent, $wpm = 230)
    {
        $total_word = str_word_count(strip_tags($allcontent));
        $m = floor($total_word / $wpm);
        // $s = floor($total_word % $wpm / ($wpm / 60)); # Get remaining sec
        $estimateTime = $m . ' min read';
        return $estimateTime;
    }

    public function getExcerpt(int $limit = 200, bool $words = false): string
    {
        $body = strip_tags($this->getBody());

        return (strlen($body) > $limit ?
            ($words
                ? str($body)->words($limit, '...')
                : str($body)->limit($limit, '...')
            ) :
            $body
        );
    }

    public function getBody(): string
    {
        return str($this->body)->markdown();
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $searchTerm = '%' . strtolower($search) . '%';
            return $query->whereRaw('LOWER(title) LIKE ?', [$searchTerm])
                ->orWhereRaw('LOWER(body) LIKE ?', [$searchTerm]);
        });

        $query->when($filters['categories'] ?? false, function ($query, $categories) {
            $categories = explode(',', $categories);
            return $query->whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('slug', $categories);
            }, '=', count($categories));
        });

        $query->when($filters['sortBy'] ?? false, function ($query, $sortBy) {
            $sortOptions = [
                'latest' => ['created_at', 'asc'],
                'oldest' => ['created_at', 'desc'],
                'a-z' => ['title', 'asc'],
                'z-a' => ['title', 'desc'],
            ];

            $sort_by = $sortOptions[$sortBy] ?? ['created_at', 'asc'];

            return $query->orderBy(...$sort_by);
        });
    }
}
