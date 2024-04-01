<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $products = Product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }

    public function AddProduct(){
        $categories = Category::latest()->get();
        return view('admin.addproducts', compact('categories'));
    }

    public function StoreProduct(Request $request){
     $request->validate([
        'product_name' => 'required|unique:products',
        'price' => 'required',
        'description' => 'required',
        'product_category_id' => 'required',
        'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);

      $image = $request->file('product_img');
      $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      $request->product_img->move(public_path('upload'),$img_name);
      $img_url = 'upload/'. $img_name;

      $category_id = $request->product_category_id;

      $category_name = Category::where('id', $category_id)->value('category_name');

        Product::insert([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'price' => $request->price,
        'product_category_name' => $category_name,
        'product_category_id' => $request->product_category_id,
        'product_img' => $img_url,
      ]);

      Category::where('id',$category_id)->increment('product_count',1);

      return redirect()->route('allproduct')->with('message','Product Added Successfully');
    }

    public function EditProductImg($id){
        $productinfo = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productinfo'));
    }

    // Update picture (ayaw potangena naguupload pero di mabago yung picture)

    public function UpdateProductImg(Request $request){
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
          
         $id = $request->id;
          $image = $request->file('product_img');
          $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          $request->product_img->move(public_path('upload'),$img_name);
          $img_url = 'upload/'. $img_name;

          Product::findOrFail($id)->update([
            'product_img' => $img_url,
          ]);

          return redirect()->route('allproduct')->with('message','Product Image Updated Successfully!');
    }

    //Update product

    public function EditProduct($id){
        $productinfo = Product::findOrFail($id);

        return view('admin.editproduct', compact('productinfo'));
    }

    public function UpdateProduct(Request $request){
        $productid = $request->id;
       
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'description' => 'required',
         ]);
       
         Product::findOrFail($productid)->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
         ]);

         return redirect()->route('allproduct')->with('message','Product Information Updated Successfully!');
    }

    public function DeleteProduct($id){
        Product::findOrFail($id)->delete();
        $cat_id = Product::where('id', $id)->value('product_category_id');
        Category::where('id', $cat_id)->decrement('product_count', 1);

        return redirect()->route('allproduct')->with('message','Product Delete Successfully!');
    }

  
}
