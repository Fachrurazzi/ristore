<?php

namespace App\Http\Livewire;

use App\Category;
use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $search;
    public $category;

    protected $updatesQueryString = ['search', 'category'];

    public function mount()
    {
        $this->search = request('search');
    }

    public function render()
    {
        $products = Product::query();

        if($this->search != null) {
            $products->where('name', 'like', '%' . $this->search . '%');
        }

        if($this->category != null) {
            $products->whereHas('categories', function($query){
                return $query->where('category_id', $this->category);
            });
        }

        return view('livewire.home', [
            'categories' => Category::with('products')->get(),
            'products' => $products->paginate(12)
        ]);
    }

    public function selectCategory($categoryId)
    {
        $this->category = $categoryId;
    }
}
