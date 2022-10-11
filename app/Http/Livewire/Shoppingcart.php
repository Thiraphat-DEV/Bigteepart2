<?php

namespace App\Http\Livewire;

use App\Models\Product;
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
    public function checkout() {
        //check shopping cart for user and product
        $cart = Cart::with('product')->where('user_id', auth()->id())->get();
        //select id and quantity and check quantity_left equa product_id
        $products = Product::select('id', 'qty')->whereIn('id', $cart->pluck('product_id'))->pluck('qty', 'id');
        //show array for checkout
        // dd($products);
        
        foreach($cart as $cartProduct) {
            if(!isset($products[$cartProduct->product_id]) || $products[$cartProduct->product_id] <$cartProduct->qty ) {
                $this->checkout_message = "Error Product is".$cartProduct->product->name. "not in Cart for You";
            }
            // $product = Product::find($cartProduct->product_id);

            // if($product || $product->qty < $cartProduct->qty) {
            // }
        }
    }
}
