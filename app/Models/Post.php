<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'content', 'image', 'slug', 'author'
    ];

    public function ScopeActive($query)
    {
        # code...
        return $query->where('active', true);
    }
    public function ScopeSelectedbyId($query, $id)
    {
        # code...
        return $query->where('id', $id);
    }

    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * Get the author that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public static function boot()
{
    parent::boot();

    static::creating(function ($post) {
        $title = str_replace('?', '', $post->title);
        $post->slug = preg_replace('/\s+/', '-', $title);
    });
    
    static::updating(function ($post) {
        $title = str_replace('?', '', $post->title);
        $post->slug = preg_replace('/\s+/', '-', $title);
    });
}
}
