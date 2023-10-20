<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\User;
use App\Models\Cart;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BaseController extends Controller
{
    public function home(){
        $products = Product::get();
        $new_products = Product::limit(6)->latest()->get();
        return view('front.home',compact('products', 'new_products'));
    }
    public function specialOffer(){
        return view('front.specialOffer');
    }
    public function delivery(){
        return view('front.delivery');
    }
    public function contact(){
        return view('front.contact');
    }
    public function cart(){
        $carts = [];
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        }
        return view('front.cart',compact('carts'));
    }
    public function productView(Request $request){
        $id = $request->id;
        $product = Product::with('ProductDetail')->find($id);
        $category_id = $product->category_id;
        $related_products = Product::where('category_id', $category_id)->get();
        return view('front.productView',compact('product', 'related_products'));
    }
    public function user_login(){
        return view('front.login');
    }
    public function loginCheck(Request $request){
        $data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if(Auth::attempt($data)){
            return redirect()->route('home');
        }else{
            return back()->withErrors(['message' => 'Invalid Email or Password']);
        }
        
    }
    public function user_store(Request $request){
        $data = array(
            'name' => $request->first_name.''.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        

        );
        // dd($data);
        $user = User::create($data);
        return redirect()->route('user_login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user_login');

    }
    
}