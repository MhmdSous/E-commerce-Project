<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallary;


class FrontendController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::latest()->take(4)->get();
        $data['collection'] = Category::with('prodcuts')->get();
        $data['categories'] = Category::latest()->get();
        return view('frontend.index', $data);
    }


    public function contact_us()
    {


        return view('frontend.pages.contact_us');
    }
    public function show($id)
    {
        $product = Product::where('id', $id)
        ->first();

        $gallaries = ProductGallary::where('product_id', $id)->get();

        $similar_products = Product::where( 'category_id', $product->category_id)->where('id', '!=', $id)->get();


        return view('frontend.pages.Details_Product', compact('product', 'gallaries', 'similar_products'));
    }
}
