<?php

namespace App\Models;

use App\Traits\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallary extends Model
{
    use HasFactory;
    protected $fillable=['image','product_id'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
