<div class="container mx-auto px-4 py-8">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
        <h1 class="text-2xl font-bold my-4">Shopping Cart</h1>
        <a 
            class="bg-purple-600 hover:bg-purple-500 text-white font-bold py-2 px-4 rounded"
            href="{{ route('order.create') }}"
            >
            Make an Order
        </a>
    </div>

    <div class="mt-8">

        @foreach($shoppingcart->products as $product)
            <div class="flex flex-col md:flex-row border-b border-gray-400 py-4">
                
                <div class="flex-shrink-0">
                    <img 
                        src="{{ $product->firstImage ? asset('storage/' . $product->firstImage->image_url) : asset('assets/images/products/default_product_image01.jpg') }}"
                        alt="Product image" 
                        class="w-32 h-32 object-cover"
                        >
                </div>

                <div class="mt-4 md:mt-0 md:ml-6">
                    <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                    <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                    <div class="mt-4 flex items-center">
                        <div class="flex items-center space-x-2">
                            <span class="ml-auto font-bold">${{ $product->unit_price }}</span>
                            <a href="#"><i wire:click="removeProduct({{ $product->id }})" class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

    <div class="flex justify-end items-center mt-8">
        <span class="text-gray-600 mr-4">Subtotal:</span>
        <span class="text-xl font-bold">${{ $subTotal }}</span>
    </div>

</div>