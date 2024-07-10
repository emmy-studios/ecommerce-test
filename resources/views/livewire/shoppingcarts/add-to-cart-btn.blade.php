<div class="flex flex-col items-start">

    <button
        wire:click="addProductToCart"
        class="px-8 py-2 bg-purple-600 text-white text-sm font-medium rounded hover:bg-purple-500 focus:outline-none focus:bg-purple-500">
        Add to Cart
    </button>

    @if (session()->has('message'))
        <div class="relative flex text-purple-500 mt-3">
            {{ session('message') }}
        </div>
    @endif

</div>