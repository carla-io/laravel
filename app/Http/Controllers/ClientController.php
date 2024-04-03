<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id){
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_template.category', compact('category', 'products'));
    }

    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        return view('user_template.product', compact('product'));
    }

    public function AddProductToCart(Request $request){
        $product_price = $request -> price;
        $quantity = $request->quantity;
        $price = $product_price* $quantity;
 
       Cart::insert([
          'product_id' => $request -> product_id,
          'user_id' => Auth::id(),
          'quantity' => $request->quantity,
          'price' => $price,
       ]);

       return redirect()->route('addtocart')->with('message', 'Your item added to cart successfully!');
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your item removed from cart successfully!');
    }
    
    public function AddToCart(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('user_template.addtocart', compact('cart_items'));
    }

    public function GetShippingAddress(){
        return view('user_template.shippingaddress');
    }

    public function Checkout(){
        return view('user_template.checkout');
    }

    public function UserProfile(){
        return view('user_template.userprofile');
    }

    public function PendingOrders(){
        return view('user_template.pendingorders'); 
    }

    public function CustomService(){
        return view('user_template.customservice');
    }
}
