<?php

namespace App\Models\Admin\Market;

use App\Models\Admin\Market\Product;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => 'brand_name'
            ]
        ];
    }
    
        
    

    protected $table = "product_brands";

    protected $cast = ['logo' => 'array'];

    protected $fillable = ['name', 'description', 'logo'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
