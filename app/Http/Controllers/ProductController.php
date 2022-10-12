<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //
    public function index() {
        $messages = Product::all()->paginate(5);
        return view('admin.dashboard')->with('messages', $messages);
    }
    public function addProduct()
    {
        return view('admin.add-product');
    }

    // store from page to db
    function storeProduct(Request $req)
    {
        
        // data from database
        $name = $req->name;
        //check image from file

        $images = $req->file('image');
        $descript = $req->descript;
        $price = $req->price;
        $imageName = time() . '.' . $images->extension();
        $images->move(public_path('images'), $imageName);
        // product
        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->description = $descript;
        $product->image = $imageName;
        $product->save();
        return redirect('/admin/dashboard')->with('product_add', 'product added to record');
    }
    // gets all product
    function products()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }
    //edit
    function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit-product', compact('product'));
    }

    //update 
    public function updateProduct(Request $req)
    {
        $name = $req->name;
        $price = $req->price;
        $descript = $req->descript;
        $image = $req->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        // product
        $product = Product::findOrFail($req->id);
        $product->name = $name;
        $product->image = $imageName;
        $product->description = $descript;
        $product->price = $price;
        $product->save();
        return redirect('/admin/dashboard')->with('product_update ', 'product update to record success');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path('images') . '/' . $product->image);
        $product->delete();
        return back()->with('product_delete', 'product delete from recorrd success');
    }
}
