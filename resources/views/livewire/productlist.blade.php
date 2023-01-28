<div>
    @include('layouts.flash-message')
    <main class="my-2">
        @if(auth()->user()->is_admin == '1')
            <a href="{{url('/admin/dashboard')}}"   class="
        px-6
        py-2.5
        bg-blue-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-blue-700 hover:shadow-lg
        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-blue-800 active:shadow-lg
        transition
        duration-150
        ease-in-out" style="margin-bottom: 1rem;">Go to Admin Page</a>
        @endif
        <div class="container mx-auto px-6 mt-2">
            <h3 class="text-gray-700 text-2xl font-medium">Products</h3>
            <div class="grid gap-6 grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach($products as $product)
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover">
                        <img src="{{asset('images')}}/{{$product->image}}" alt="" style="width:200px;height:230px;">
                        <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" wire:click="addToCart({{ $product->id }})">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-black-700 uppercase">{{ $product->name }}</h3>
                        <span class="text-black-500 mt-2">${{ $product->price}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>