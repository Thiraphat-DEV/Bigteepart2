<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
//model
use App\Models\Product;
use App\Models\User;
use App\Models\Shoppingcart;
class PdfController extends Controller
{
    //
    public function index(Request $req) {
        $products = Shoppingcart::latest()->paginate(50);

        if($req->has('download')) {
            $generatePdf = PDF::loadView("admin.dashboard", compact('products'))->setOptions(['defaultFont' => 'san-serif']);
            return $generatePdf->download('users.pdf');
        }

        return view('admin.dashboard', compact('products'));
    }
}
