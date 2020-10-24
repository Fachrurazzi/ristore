<?php

namespace App\Support;

use App\Product;

class Cart
{
    public function __construct()
    {
        if($this->get() === null) {
            $this->set($this->empty());
        }
    }

    public function set($cart)
    {
        session()->put('cart', $cart);
    }

    public function get()
    {
        return session()->get('cart');
    }

    public function add(Product $product)
    {
        $cart = $this->get();

        array_push($cart['products'], $product);

        $this->set($cart);
    }

    public function remove(int $productId)
    {
        $cart = $this->get();

        array_splice(
            $cart['products'],
            array_search(
                $productId,
                array_column(
                    $cart['products'], 'id'
                )
            ),
            1
        );

        $this->set($cart);
    }

    public function clear()
    {
        $this->set($this->empty());
    }

    public function empty()
    {
        return [
            'products' => [],
        ];
    }

    public function removeItem(int $productId)
    {
        $cart = $this->get();
        $filtered['products'] = array_filter($cart['products'], function($item) use ($productId) {
            return $item['id'] !== $productId;
        });

        $this->set($filtered);
    }

}