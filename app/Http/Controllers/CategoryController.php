<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\CategoryExport;
use App\Exports\CategoryReportExport;
use App\Traits\Image;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    use Image;
    public function exportCategoryExcel()
    {
        return Excel::download(new CategoryReportExport(), 'categories.xlsx');
    }
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

    public function getAllCategories()
    {
        if (\request()->ajax()) {
            $categories = Category::latest()->get();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('name', function ($categories) {
                    return $categories->name;
                })->addColumn('image', function ($product) {

                    return $product->image;
                })
                ->addColumn('actions', function ($row) {

                    $actionBtn = '<a  data-id="' . $row->id . '" data-url="'.route('categories.edit',$row->id).'" href="javascript:void(0)" class="edit btn btn-success btn-sm mr-2" >Edit</a>' .
                        '<a href="javascript:void(0)" onclick="return confirm(\'Are you sure you want to delete this item?\')" data-id="' . $row->id . '" data-url="'.route('categories.destroy',$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
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
            'name' => ['required', Rule::unique('categories')->ignore($request->id)],
        ]);
        if (!is_null($request->id)) {
            $category = Category::findorfail($request->id);
            $category->image = $this->updateImage($request, $category, 'image', 'categries');
            $msg = 'updated';
        } else {

            $category = new Category();
            $category->image = $this->storeImage($request, 'image', 'categries');
            $msg = 'created';
        }

        $category->name = $request->name;
        $category->save();

        return response()->json([
            'message' => "Category $msg successfully.",
            'data' =>  $category
        ]);
    }

    public function edit($category_id)
    {

        $category = Category::findorfail($category_id);

        return response()->json(['data' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        // $request->validate([
        //     'name' => 'required|unique:categories,name,' . $category->id
        // ]);

        // $category->update($request->all());

        // return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully.']);
    }
}
