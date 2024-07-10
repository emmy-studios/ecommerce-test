<div class="flex flex-col items-start">

    <button
        wire:click="addProductToWishlist"
        class="mx-2 text-purple-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none"
        >
        <i class="fa-regular fa-heart h-5 w-5"></i>                            
    </button>

    @if (session()->has('message'))
        <div class="relative flex text-purple-500 mt-3 pt-3">
            {{ session('message') }}
        </div>
    @endif

</div>