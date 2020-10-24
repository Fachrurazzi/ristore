<div class="fixed w-full top-0">
    @if (Route::has('login'))
        <div class="flex items-center flex-wrap bg-pink-600 text-white p-4">
            <div class="flex-1">
                <a href="{{ route('index') }}">
                    <h1 class="font-bold md:ml-12 items-center flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag h-8 w-8"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        <span class="text-3xl ml-2">
                            Ristore
                        </span>
                    </h1>
                </a>
            </div>
            <div class="justify-end md:mr-12">
                @auth
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" class="w-8 h-8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="text-2xl"><a href="{{ route('cart.index') }}">( {{ $cartTotal }} )</a></span>
                        {{-- <a href="{{ url('/home') }}">Home</a> --}}
                    </div>
                @else
                    <a href="{{ route('login') }}" class="font-bold mr-2">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-bold">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    @endif
</div>