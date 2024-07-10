<div 
    x-data="{ openProfile: false }" 
    class="pt-2 relative">

    {{-- image button --}}
    <button 
        @click="openProfile = !openProfile"
        class="block w-10 h-10 rounded-full overflow-hidden border-2 border-white focus:outline-none focus:border-purple-500">
        @auth()
            @if(empty($user->profile_image))
                <img 
                    class="h-full w-full object-cover" 
                    src="{{ asset('assets/images/accounts/users/user_profile_default.png' )}}"
                    alt="User Image"
                    >
            @else
                <img 
                    class="h-full w-full object-cover" 
                    src="{{ asset('assets/images/accounts/users/' . $user->profile_image) }}"
                    alt="User Image"
                    >
            @endif

        @endauth
        @guest
            <img 
                class="h-full w-full object-cover" 
                src="{{ asset('assets/images/accounts/users/user_profile_default.png')}}"
                alt="User Image"
                >
        @endguest
    </button>

    <div x-show="openProfile" @click.outside="openProfile = false" x-cloak
        class="absolute right-0 mt-2 py-2 w-32 bg-white rounded-lg shadow-xl">

        @auth
            
            <a 
                class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
                href="{{ route('profile.edit') }}">
                Edit Profile
            </a>

            <a 
                class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white"
                href="{{ route('dashboard') }}">
                Dashboard
            </a>
    
            <a 
                class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
                href="{{ route('logout') }}">
                Logout
            </a>

        @endauth
        
        @guest
            
            <a 
                class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
                href="{{ route('login') }}">
                Login
            </a>

            <a 
                class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
                href="{{ route('signup') }}">
                Signup
            </a>

        @endguest

    </div>

</div>