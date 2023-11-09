<?php

namespace App\Models\Admin\Content;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Content\PostCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => 'name'
            ]
        ];
    }

    protected $cast = ['image' => 'array'];

    protected $fillable = [
        'title',
        'body',
        'summary',
        'image',
        'slug',
        'commentable',
        'tags',
        'published_at',
        'category_id',
    ];

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }
}
