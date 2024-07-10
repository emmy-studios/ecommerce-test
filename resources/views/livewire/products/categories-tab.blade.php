<div>
    
    <div class="flex flex-row justify-center space-x-3 flex-wrap my-2">

        @foreach($categories as $category)
            <p class="px-3 py-2 text-sm font-bold">
                {{ $category->name }}
            </p>
        @endforeach
    
    </div>

</div>
