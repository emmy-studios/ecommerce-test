<div class="flex -mx-2">

        
    @if($socialmediaLinks && $socialmediaLinks->twitter_url)
        <a 
            href="{{ $socialmediaLinks->twitter_url }}" 
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-purple-500 dark:hover:text-purple-400" 
            aria-label="Twitter">
            <i class="fa-brands fa-twitter w-5 h-5"></i>
        </a>
    @endif

    @if($socialmediaLinks && $socialmediaLinks->instagram_url)
        <a 
            href="{{ $socialmediaLinks->instagram_url }}" 
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-purple-500 dark:hover:text-purple-400" 
            aria-label="Instagram">
            <i class="fa-brands fa-square-instagram w-5 h-5"></i>
        </a>
    @endif
        
    @if($socialmediaLinks && $socialmediaLinks->facebook_url)
        <a 
            href="{{ $socialmediaLinks->facebook_url }}" 
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-purple-500 dark:hover:text-purple-400" 
            aria-label="Facebook">
            <i class="fa-brands fa-square-facebook w-5 h-5"></i>
        </a>
    @endif

    @if($socialmediaLinks && $socialmediaLinks->linkedin_url)
        <a 
            href="{{ $socialmediaLinks->linkedin_url }}" 
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-purple-500 dark:hover:text-purple-400" 
            aria-label="Linkedin">
            <i class="fa-brands fa-linkedin w-5 h-5"></i>
        </a>
    @endif

    @if($socialmediaLinks && $socialmediaLinks->tiktok_url)
        <a 
            href="{{ $socialmediaLinks->tiktok_url }}" 
            class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-purple-500 dark:hover:text-purple-400" 
            aria-label="Linkedin">
            <i class="fa-brands fa-tiktok w-5 h-5"></i>
        </a>
    @endif

</div>
