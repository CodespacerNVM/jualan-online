<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['reading_time'];
    protected $cats = [
        'tags' => 'array'
    ];

    public function readingTime(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getReadTime($this->body)
        );
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
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
        $body = $this->body;

        return
            strlen($body) > $limit ?
            ($words
                ? str($body)->words($limit, '...')
                : str($body)->limit($limit, '...')
            ) :
            $body;
    }

    public function getBody(): string
    {
        return str($this->body)->markdown();
    }
}
