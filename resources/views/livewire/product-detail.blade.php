<div class="flex flex-wrap bg-white mt-2 px-8 py-6">
    <div class="w-full md:w-2/6">
        <img src="{{ $product->getImage() }}" alt="{{ $product->name }}">
    </div>

    <div class="w-full md:w-4/6">
        <h1 class="text-3xl font-bold border-b">{{ $product->name }}</h1>
        <p class="my-2 text-gray-700 text-xl">{{ $product->description }}</p>
        <div class="flex my-2">
            <div class="md:w-2/6">
                <p class="text-gray-600 text-lg my-2">Categories</p>
                <p class="text-gray-600 text-lg my-2">Stock</p>
                <p class="text-gray-600 text-lg my-2">Price</p>
            </div>

            <div class="md:w-4/6">
                <p class="text-lg my-2">
                    @foreach ($product->categories as $category)
                        <span class="bg-pink-400 text-white my-2 p-2 text-sm">{{ $category->name }}</span>
                    @endforeach
                </p>
                <p class="text-gray-600 text-lg my-2">{{ $product->qty }}</p>
                <p class="text-red-500 text-lg my-2 font-bold">{{ format_rupiah($product->price) }}</p>
            </div>
        </div>
        <button wire:click="addToCart({{ $product->id }})" class="bg-pink-600 text-white font-bold p-3 mt-5 hover:bg-pink-400">Add to Cart</button>
    </div>
</div>
