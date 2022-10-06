<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Producthome extends Component
{
    public function render()
    {
        $product = Product::get();

        return view('livewire.producthome',['products'=>$product]);
    }
}
