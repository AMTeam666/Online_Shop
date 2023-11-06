<?php

namespace App\Models\Admin\Market;

use App\Models\Admin\Market\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $cast = ['logo' => 'array'];

    protected $fillable = ['brand_name', 'description', 'logo'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
