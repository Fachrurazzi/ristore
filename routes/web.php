<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home')->name('index');

Route::livewire('/product/{product:slug}', 'product-detail')->name('product.detail');

Route::livewire('/cart', 'cart-index')->name('cart.index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
