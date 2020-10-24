<div>
    <div class="flex">
        <div class="w-4/5">
            <h2 class="text-4xl font-bold">Shoping Cart</h2>
        </div>

        <div class="w-1/5 flex justify-end">
            <button wire:click="clearCart" class="bg-red-500 hover:bg-red-400 p-2 mr-2 mb-2 text-white">Clear Cart</button>
        </div>
    </div>
    @forelse ($items as $item)
        <div class="flex bg-white p-2 mb-2">
            <div class="w-1/6">
                <img src="{{ $item['image'] }}" class="h-32 w-32" alt="{{ $item['name'] }}">
            </div>

            <div class="w-5/6">
                <div class="flex">
                    <div class="w-5/6 justify-start flex-col">
                        <h3 class="font-bold text-2xl">{{ $item['name'] }}</h3>
                        <p>{{ $item['qty'] }} x @ {{ format_rupiah($item['price']) }}</p>
                        <div class="flex space-x-2 mt-2">
                            <button wire:click="subtractQty({{ $item['id'] }})" class="flex items-center justify-center bg-red-500 hover:bg-red-400 p-2 h-8 w-8 text-white">-</button>
                            <button wire:click="addQty({{ $item['id'] }})" class="flex items-center justify-center bg-teal-500 hover:bg-teal-400 p-2 h-8 w-8 text-white">+</button>
                        </div>
                    </div>
                    <div class="w-1/6">
                        <div class="flex justify-end">
                            <button wire:click="removeItem({{ $item['id'] }})" class="bg-red-500 hover:bg-red-400 p-2 mr-2 mb-2 text-white">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <span class="text-xl font-bold">{{ format_rupiah($item['subtotal']) }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="flex bg-white p-4 mb-2 items-center justify-center">
            <h2 class="text-2xl font-bold">No items in Cart</h2>
        </div>
        @endforelse

        @if ($items->count() != 0)
        <div class="flex bg-white p-4 mb-2 items-center">
            <div class="w-4/5">
                <span class="text-xl font-bold">Total Belanja</span>
            </div>

            <div class="w-1/5 flex justify-end">
                <span class="text-xl font-bold">{{ format_rupiah($grandTotal) }}</span>
            </div>
        </div>
        @endif
</div>