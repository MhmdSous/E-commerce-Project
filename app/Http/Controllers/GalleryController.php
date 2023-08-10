<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallary;
use App\Traits\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use Image;
    public function index($product_id){
        $product = Product::findOrFail($product_id);
        $gallery = ProductGallary::where('product_id', $product_id)->latest()->get();
       return view('backend.products.gallery',compact('gallery','product'));
    }
    public function store(Request $request){

       $request->validate([
            'image' => ['nullable'],
            'product_id' => ['required', 'exists:products,id']
        ]);


        if (!is_null($request->id)) {
            $gallery = ProductGallary::findOrFail($request->id);
            $gallery->product_id = $request->input('product_id');
            $gallery->image = $this->updateImage($request,$gallery,'image' , 'product/gallery',true);
            $gallery->save();
            $msg = 'updated';

        } else {
            $gallery = new ProductGallary();
            $gallery->product_id = $request->input('product_id');
            $gallery->image = $this->storeImage($request, 'image', 'product/gallery',true);
            $gallery->save();
            $msg = 'created';

            }








        return response()->json([
            'message' => "Image $msg successfully.",

        ]);

    }
}
