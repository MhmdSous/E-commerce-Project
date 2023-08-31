<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorite(Request $request)
    {

        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if ($product_check) {
                if (Favorite::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json([
                        'message' =>  $product_check . "Already added to favorite.",
                    ]);
                } else {

                    $favItem = new Favorite();
                    $favItem->product_id = $product_id;
                    $favItem->user_id = Auth::id();
                    $favItem->save();
                    return response()->json([
                        'message' =>  $product_check . "Added to favorite.",
                    ]);
                }
            }
        } else {
            return response()->json([
                'message' => "Please login first.",
            ]);
        }
    }

    public function viewFavorite()
    {
        $data = [];
        $data['favItems'] = Favorite::with('products')->where('user_id', Auth::id())->latest()->get();
        $dat['cartItems'] = Cart::with('products')->where('user_id', Auth::id())->latest()->get();
        return view('frontend.pages.favorites', $data);
    }


    public function removeFromFavorite(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if ($product_check) {
                if (Favorite::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    Favorite::where('product_id', $product_id)->where('user_id', Auth::id())->delete();
                    return response()->json([
                        'message' =>  $product_check . "Removed from favorite.",
                    ]);
                } else {
                    return response()->json([
                        'message' =>  $product_check . "Not found in favorite.",
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
