<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
class BarChartController extends Controller
{
    public function barChart() {
        $result = DB::table("products")
        ->select("products.*",DB::raw("COUNT(*) as total_quantity, price"))->orderBy('id')
        ->join("shoppingcarts","shoppingcarts.product_id","=","products.id")
        ->groupBy("products.id")
        ->get();
        // dd($result);
        $chartData = "";

        foreach($result as $list) {
            $chartData.="['".$list->total_quantity."',     ".$list->price."],";
        }

        $arr['chartData'] = rtrim($chartData, ",");
        // echo $chartData;
        return view('admin.barchart', compact('chartData'));
    }
}
