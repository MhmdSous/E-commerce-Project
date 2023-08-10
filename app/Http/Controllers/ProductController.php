<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallary;
use App\Traits\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use Image;
// public function __construct()
// {
// $this->middleware('auth:admin');
// }
    public function index()
    {
        $categories = Category::latest()->get();
        $products = Product::all();
        return view('backend.products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function getAllProducts(Request $request)
    {
        if ($request->ajax()) {

            $products = Product::query()->latest()->with('category');

            return DataTables::of($products)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->input('search.value'))) {
                        $search = $request->input('search.value');
                        $query->whereHas('category', function ($q) use ($search) {
                            $q->where('name', 'LIKE', "%$search%");
                        });
                        $query->get();
                    }
                })

                ->addColumn('category_name', function ($product) {
                    return $product->category->name;
                })
                ->addColumn('image', function ($product) {

                    return $product->image;
                })
                ->addColumn('actions', function ($row) {
                    $actionBtn = '<div class="d-flex gap-1">' .
                        '<a data-id="' . $row->id . '" href="javascript:void(0)" class="edit btn btn-success btn-sm mr-2">Edit</a>' .
                        '<a href="javascript:void(0)" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm mr-2">Delete</a>' .
                        // '<a href="javascript:void(0)" data-id="' . $row->id . '" class="gallery btn btn-success btn-sm">Add</a>' .
                        '<a href="' . route("products.gallery.index", $row->id) . '" class="show btn btn-info btn-sm">Show</a>' .
                        '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', Rule::unique('products')->ignore($request->id)],
            'image' => ['nullable'],
            'gallery' => ['required', 'array']
        ]);

        DB::beginTransaction();
        try{

            if (!is_null($request->id)) {
                $product = Product::findOrFail($request->id);
                $product->name = $request->input('name');
                $product->category_id = $request->input('category_id');

                $product->image = $this->updateImage($request, $product, 'image', 'products');
                $product->save();
                $productGallery = new ProductGallary();

                $paths  = $this->updateImage($request, $productGallery, 'gallery', 'product/gallery','public', true);
                foreach($paths as $path) {

                    $productGallery->product_id = $product->id;
                    $productGallery->image = $path;
                    $productGallery->save();
                }


                $msg = 'updated';
            } else {
                $product = new Product();
                $product->name = $request->input('name');
                $product->category_id = $request->input('category_id');

                $product->image = $this->storeImage($request, 'image', 'products');
                $product->save();
                $product->refresh();
                $pathes = $this->storeImage($request, 'gallery','product/gallery','public',  true);

                foreach ($pathes as $path) {
                    $productGallery = new ProductGallary();
                    $productGallery->product_id = $product->id;
                    $productGallery->image = $path;
                    $productGallery->save();
                }
                $msg = 'created';
            }
            DB::commit();
        }catch(\Exception $e) {

            DB::rollBack();
            return $e->getMessage();
        }

        // Handle the image upload using the Image trait




        return response()->json([
            'message' => "Product $msg successfully.",
            'data' => $product
        ]);
    }

    public function edit($product_id)
    {

        $product = Product::findorfail($product_id);



        return response()->json(['data' => $product]);
    }

    public function update(Request $request, product $product)
    {
        // $request->validate([
        //     'name' => 'required|unique:categories,name,' . $product->id
        // ]);

        // $product->update($request->all());

        // return redirect()->route('categories.index')->with('success', 'product updated successfully.');
    }

    public function destroy(Product $product)
    {

        $product->delete();
        if ($product) {
            $product->gallaries()->delete();
        }

        return response()->json(['message' => 'Product deleted successfully.']);
    }
}
