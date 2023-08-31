<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception\InvalidOrderException;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cartItems = Cart::latest()->first();
        $user = Auth::user();

        return view(
            'frontend.payments.checkout',
            [
                'user' => $user,
                'intent' => $user->createSetupIntent(),
                'cartItems' => $cartItems
            ]
        );
    }
    public function store(Request $request)
    {
        $order = Order::create([
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getTotalPrice(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'first_name'        =>  $request['first_name'],
            'last_name'         =>  $request['last_name'],
            'address'           =>  $request['address'],
            'city'              =>  $request['city'],
            'country'           =>  $request['country'],
            'post_code'         =>  $request['post_code'],
            'phone_number'      =>  $request['phone_number'],
            'notes'             =>  $request['notes']
        ]);

        if ($order) {

            $items = Cart::with('products')->get();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->products->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getTotalPrice()
                ]);

                $order->items()->save($orderItem);
            }
        }




        return redirect()->route('payment.create', [
            'order_id' => $order->id,
        ]);
    }
}
