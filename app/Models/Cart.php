<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['product_id','user_id','quantity'];
    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public static function getTotalPrice(){

        $cartItems= Cart::where('user_id',Auth::id())->get();
        $totalPrice=0;
        foreach($cartItems as $cartItem){
            $totalPrice+=$cartItem->quantity*$cartItem->products->price;
        }
        return "$totalPrice";

    }
    public static function getTotalQuantity(){
        $cartItems= Cart::where('user_id',Auth::id())->get();

        $totalQuantity=0;
        foreach($cartItems as $cartItem){
            $totalQuantity+=$cartItem->quantity;
        }
        return $totalQuantity;
    }
}
