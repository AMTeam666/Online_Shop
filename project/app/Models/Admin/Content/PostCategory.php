<?php

namespace App\Models\Admin\Content;

use App\Models\Admin\Content\Post;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostCategory extends Model
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

    protected $fillable = ['name', 'slug', 'tags'] ;

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
