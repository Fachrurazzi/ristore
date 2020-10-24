<?php

namespace App\Http\Livewire;

use App\Product;
use App\Support\Facades\Cart;
use Livewire\Component;

class CartIndex extends Component
{
    public $cart;
    public $grandTotal = 0;

    public function mount()
    {
        $this->cart = Cart::get();
        $this->grandTotal = collect($this->cart['products'])->sum('price');
    }

    public function render()
    {
        $items = collect($this->cart['products']);

        $items = $items->groupBy('id')->transform(function($item){
            return [
                'id' => $item[0]->id,
                'name' => $item[0]->name,
                'image' => $item[0]->image,
                'description' => $item[0]->description,
                'qty' => $item->count(),
                'price' => $item[0]->price,
                'subtotal' => $item->sum('price')
            ];
        });

        return view('livewire.cart-index', [
            'items' => $items->sortBy('name')
        ]);
    }

    public function clearCart()
    {
        Cart::clear();
        $this->updateCart();

    }

    public function removeItem(int $productId)
    {
        Cart::removeItem($productId);
        $this->updateCart();
    }

    public function subtractQty(int $productId)
    {
        Cart::remove($productId);
        $this->updateCart();
    }

    public function addQty(int $productId)
    {
        Cart::add(Product::find($productId));
        $this->updateCart();
    }

    private function updateCart()
    {
        $this->cart = Cart::get();
        $this->grandTotal = collect($this->cart['products'])->sum('price');
        $this->emit('updateCartTotal');
    }
}
