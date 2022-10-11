<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin;
class BarChartController extends Controller
{
    public function barChart() {
        $chart = Product::select("id" ,"price")->get();

        $answer = [ "id", "price"];
        //loop show data

        foreach($chart as $key => $value) {
            $answer[++$key] = [(int)$value->id, (double)$value->price];
        }

        return view('admin.barchart', compact('answer'));
    }
}
