<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    
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

protected $fillable = [
    'title',
    'content'
];

    public static function boot()
{
    parent::boot();

    static::creating(function ($post) {
        $title = str_replace('?', '', $post->title);
        $post->slug = preg_replace('/\s+/', '-', $title);
    });
}
}