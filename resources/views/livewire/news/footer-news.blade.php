<div class="flex flex-col items-start mt-5 space-y-2">

    @foreach ($threeNews as $news)
        
    <a 
        href="{{ route('news.show', ['id' => $news->id]) }}" 
        class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-purple-400 hover:underline hover:text-purple-500">
        {{ $news->title }}
    </a>

    @endforeach

</div> 