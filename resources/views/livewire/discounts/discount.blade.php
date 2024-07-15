<div>

    @if($lastDiscount)

        <div class="bg-gradient-to-r from-blue-700 to-[#B06AB3] font-sans px-6 py-12">
        
            <div class="container mx-auto flex flex-col justify-center items-center text-center">
                <h2 class="text-white sm:text-4xl text-3xl font-bold mb-4">
                    Use the code below and apply the discount
                </h2>
                <p class="text-white text-4xl">{{ floor($lastDiscount->discount_percentage) }}%</p>
                <div class="grid grid-cols-1 md:grid-cols-2 justify-items-center items-center pt-0 md:pt-8">
                    <div class="space-y-2">
                        <p class="text-white text-2xl"><span class="font-bold text-white text-2xl">Code: </span> {{ $lastDiscount->discount_code }}</p>
                        <p class="text-white text-3xl">In this product</p>
                    </div>
        
                    @if($lastDiscount->banner_image)
        
                        <img
                            class="h-28 rounded-sm md:pt-0 pt-8" 
                            src="{{ asset('storage/' . $lastDiscount->banner_image) }}" 
                            alt="Discount Image">
                    
                    @else
        
                        <img
                            class="h-28 rounded-sm md:pt-0 pt-8" 
                            src="{{ asset('assets/images/products/default_product_image01.jpg') }}" 
                            alt="Discount Image">
        
                    @endif
        
                </div>
        
            </div>
                
        </div>

    @endif

</div>



