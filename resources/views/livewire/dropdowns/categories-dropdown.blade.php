<div
    x-show="productsShow"
    @click.outside="productsShow = false"
    x-cloak
    class="absolute right-0 mt-10 py-2 w-32 bg-white rounded-lg shadow-xl">
    
    @foreach($categories as $category)

        <a
            class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white"
            href="#">
            {{ $category->name }}
        </a>

    @endforeach
    
    <div class="flex flex-row my-4 mx-2">
        <a 
            class="text-purple-700 hover:text-purple-500 hover:cursor-pointer" 
            href="#"
            >
            All Categories
        </a>
    </div>

</div>