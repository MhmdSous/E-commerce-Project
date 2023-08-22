<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

public function viewCart(){
    $cartItems=Cart::with('products')->where('user_id',Auth::id())->get();



    return view('frontend.pages.add_to_cart',compact('cartItems'));
}

    public function removeFromCart(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if($product_check){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    Cart::where('product_id',$product_id)->where('user_id',Auth::id())->delete();
                    return response()->json([
                        'message' =>  $product_check."Removed from cart.",
                    ]);
                }else{
                    return response()->json([
                        'message' =>  $product_check."Not found in cart.",
                    ]);
                }

            }

        } else {
            return response()->json([
                'message' => "Please login first.",
            ]);
        }
}


    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if($product_check){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json([
                        'message' =>  $product_check."Already added to cart.",
                    ]);
                }else{

                    $cartItem= new Cart();
                      $cartItem->product_id=$product_id;
                      $cartItem->user_id=Auth::id();
                      $cartItem->save();
                      return response()->json([
                          'message' =>  $product_check."Added to cart.",
                      ]);
                }

            }

        } else {
            return response()->json([
                'message' => "Please login first.",
            ]);
        }
    }
}
