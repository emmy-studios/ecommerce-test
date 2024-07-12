<div 
    x-show="blogShow" 
    @click.outside="blogShow = false" 
    x-cloak 
    class="absolute right-0 mt-10 py-2 w-32 bg-white rounded-lg shadow-xl"
    >

    @foreach($brands as $brand)
        <a 
            class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
            href="#"
            >
            {{ $brand->name }}
        </a>
    @endforeach

    <div class="flex flex-row px-2 my-4 text-purple-700 hover:text-purple-500 hover:cursor-pointer">
        <a href="{{ route('brands') }}">
            All Brands
        </a>
    </div>

</div>
