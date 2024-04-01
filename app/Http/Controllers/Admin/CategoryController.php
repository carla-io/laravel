<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function AddCategory(){
        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request){
         $request->validate([
               'category_name' => 'required|unique:categories'
         ]);

         Category::insert([
                 'category_name' => $request->category_name,
         ]);

         return redirect() -> route('allcategory')->with('message', 'category added succesfully!');
    }

    Public function EditCategory($id){
        $category_info = Category::findOrFail($id);

        return view('admin.editcategory', compact('category_info'));
    }

    public function UpdateCategory(Request $request){
        $category_id = $request->category_id;
        
        $request->validate([
            'category_name' => 'required|unique:categories'
      ]);

      Category::findorFail($category_id)->update([
        'category_name' => $request->category_name,
      ]);

      return redirect() -> route('allcategory')->with('message', 'category updated succesfully!');

    }

    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();

        return redirect()->route('allcategory')->with('message','Category Deleted Successfully!');
    }
}
