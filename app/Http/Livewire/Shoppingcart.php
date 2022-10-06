<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart as Cart;

class Shoppingcart extends Component
{
    public $cartitems, $sub_total = 0, $total = 0, $tax = 0 ;

    public function render()
    {
        $this->cartitems = Cart::with('product')->where(['user_id' => auth()->user()->id])->get();
        $this->total = 0;$this->sub_total = 0; $this->tax = 0;
        foreach($this->cartitems as $item){
            $this->sub_total += $item->product->price * $item->quantity;
        }
        $this->total = $this->sub_total - $this->tax;
        return view('livewire.shoppingcart');
    }

    public function incrementQty($id) {
        $cart = Cart::whereId($id)->first();
        $cart->quantity +=1;
        $cart->save();

        session()->flash('success', 'Product Quantity update Increase');
    }
    

    public function decrementQty($id) {
        $cart = Cart::whereId($id)->first();

        if($cart->quantity > 1) {
            $cart->quantity -=1;
            $cart->save();
    
            session()->flash('success', 'Product Quantity update decrease');
        }else {
            session()->flash('success', 'Error of Decrease Product Count');
        }
    }

    public function removeItem($id) {
        $cart = Cart::whereId($id)->first();

        if($cart) {
            $cart->delete();
            $this->emit('updateCartCounter');
        }
        session()->flash('success', 'Product Remove from cart!!');
    }
}
