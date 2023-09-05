<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use App\Notifications\CartNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CartController extends Controller
{

    public function viewCart()
    {
        //  diplay the products in the cart
        $cartItems = Cart::with('products')->where('user_id', Auth::id())->latest()->get();
        return view('frontend.pages.add_to_cart', compact('cartItems'));
    }

    public function removeFromCart(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if ($product_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    Cart::where('product_id', $product_id)->where('user_id', Auth::id())->delete();
                    return response()->json([
                        'message' =>  $product_check . "Removed from cart.",
                    ]);
                } else {
                    return response()->json([
                        'message' =>  $product_check . "Not found in cart.",
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
        $quantity = $request->input('quantity');
        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if ($product_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json([
                        'message' =>  $product_check . "Already added to cart.",
                    ]);
                } else {

                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->quantity = $quantity;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();

                    return response()->json([
                        'message' =>  $product_check . "Added to cart.",
                    ]);



                }
            }
        } else {
            return response()->json([
                'message' => "Please login first.",
            ]);
        }
    }


    public function updateCartQuantity(Request $request)
    {

        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        $cartItem = Cart::find($itemId);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            // with $  sign
            $totalPrice = '$' . Cart::getTotalPrice();

            return response()->json(['totalPrice' => $totalPrice]);
        }

        return response()->json(['error' => 'Cart item not found'], 404);
    }
    public function addMultipleToCart(Request $request)
    {
        $user_id = $request->user_id;
        $products = $request->products;

        foreach ($products as $product) {
            $cartItem = new Cart();
            $cartItem->user_id = $user_id;
            $cartItem->product_id = $product['product_id'];
            $cartItem->quantity = $cartItem['quantity'];



            // You can set other fields like image, name, etc. as needed
            $cartItem->save();
        }

        return response()->json(['message' => 'Products added to cart successfully']);
    }

    public function cartHistory()
    {
        //  diplay the products in the cart with deleted products
        $cartItems = Cart::with('products')->where('user_id', Auth::id())->onlyTrashed()->latest()->get();
        return view('frontend.pages.cart_history', compact('cartItems'));
    }

    public function ForceDeleteCartItem(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if ($product_check) {
                if (Cart::onlyTrashed()->where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    //   force delete
                    Cart::onlyTrashed()->where('product_id', $product_id)->where('user_id', Auth::id())->forceDelete();
                    return response()->json([
                        'message' =>  $product_check . "Removed from cart.",
                    ]);
                } else {
                    return response()->json([
                        'message' =>  $product_check . "Not found in cart.",
                    ]);
                }
            }
        } else {
            return response()->json([
                'message' => "Please login first.",
            ]);
        }
    }
    public function restore(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->exists();
            if ($product_check) {
                if (Cart::onlyTrashed()->where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    //   force delete
                    Cart::onlyTrashed()->where('product_id', $product_id)->where('user_id', Auth::id())->restore();
                    return response()->json([
                        'message' =>  $product_check . "Restored to cart.",
                    ]);
                } else {
                    return response()->json([
                        'message' =>  $product_check . "Not found in cart.",
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
