<?php

namespace App\Models;

use App\Traits\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','image','category_id', 'price'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id' );
    }
    public function gallaries(){
        return $this->hasMany(ProductGallary::class,'product_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function favorites(){
        return $this->hasMany(Favorite::class,'product_id','id');
    }
    
}
