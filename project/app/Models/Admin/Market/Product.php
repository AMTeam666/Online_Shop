<?php

namespace App\Models\Admin\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => 'product_name'
            ]
        ];
    }

    protected $cast = ['product_image' => 'array'] ;
    protected $fillable = 
    ['product_name', 
    'product_image', 
    'price', 
    'stock', 
    'age_range', 
    'gender', 
    'stock_status', 
    'category_id', 
    'user_id',
    'brand_id'] ;

     public function brand(){
        return $this->belongsTo(Brand::class);
     }
     public function category(){
        return $this->belongsTo(ProductCategory::class);
     }


}
