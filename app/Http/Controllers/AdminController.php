<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\RegistrationRequest;

class AdminController extends Controller
{

    public function register(){
        return view('admin.register');
    }
    public function registeradmin(RegistrationRequest $request)
    {
        $validatedData = $request->validated();
        $admin = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        if($admin){
            return redirect(url('admin/login'))->with('success', 'User registered successfully! Plase login now');
        }
    }

    public function login()
    {
        return view('admin.login');
    }




    public function adminlogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($validatedData)) {
            return redirect('/admin/dashboard')->with('success', 'Login successful!');
        }
        return redirect()->back()
        ->withInput()
        ->withErrors(['email' => 'Invalid email or password']);


    }




    public function dashboard(){
        $productCount = Product::count();
        $userCount = User::count();
        $orderCount = Order::count();
        $allcount = [
            'productCount' => $productCount,
            'userCount' => $userCount,
            'orderCount' => $orderCount,
        ];

        return view('admin.dashboard',compact('allcount'));
    }
    public function category()
    {
        $category = Categories::pluck('product_category');
        return view('admin.category', compact('category'));
    }

    public function create_category(){
        return view('admin.create_category');
    }
    public function create_category_name(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Categories();
        $category->product_category = $validatedData['category_name'];
        $category->save();

        return redirect(url('admin/create_category'))->with('success', 'Product created successfully');
    }







    public function product(){
        $product = Product::all();
        return view('admin.product',compact('product'));
    }
    public function create_product(){
        $categories = Categories::all();
        return view('admin.create_product', compact('categories'));
    }
    public function product_include(ProductRequest $request){
        $alldata = $request->validated();
        $product = new Product();
        $product->product_name = $alldata['product'];
        $product->product_price = $alldata['price'];
        $product->product_category = $alldata['category'];
        $product->save();
        return redirect(url('admin/create_product'))->with('success', 'Product created successfully');
    }

    public function edit_product($id){
        $product = Product::find($id);
        $categories = Categories::all();
        return view('admin.edit_product', compact('product','categories'));
    }

    public function update_product(ProductRequest $request ,$id){
        $validatedData = $request->validated();
        $product = Product::find($id);
        $product->update([
            'product_name' => $validatedData['product'], // Replace 'field1', 'field2', etc., with your actual field names
            'product_price' => $validatedData['price'],
            'product_category' => $validatedData['category'],
        ]);
        return redirect(url('admin/product'))->with('success', 'Product update successfully');
    }
    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }









    public function order(){
        $allorder =  Order::all();
        return view('admin.order',compact('allorder'));
    }
    public function user(){
        $users = User::all();
        return view('admin.user',compact('users'));
    }
    public function adminprofile(){
        return view('admin.adminprofile');
    }
    public function adminprofileupdate(Request $request){
        $updateadmin = $request->all();
        $Admin = Admin::find($updateadmin['admin_id']);
        $Admin->update([
            'name' => $updateadmin['name'],
            'email' => $updateadmin['email'],
        ]);
        return redirect(url('admin/adminprofile'))->with('success', 'Profile update successfully');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/')->with('success', 'Admin Logout successful!');
    }
}
