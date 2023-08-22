<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallary;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
        $data = [];
        $data['products'] = Product::latest()->take(4)->get();
       return view('frontend.index',$data);
   }


   public function contact_us()
   {
       return view('frontend.pages.contact_us');
   }


}
