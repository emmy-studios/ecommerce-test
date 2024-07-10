<header x-data="{ responsiveNav: false }">

    <nav class="border-b px-4 py-2 bg-white">

        <div class="flex flex-wrap items-center justify-between md:justify-around">
            {{-- Logo --}}
            <img 
                class="h-4 w-25" 
                src="{{ asset('assets/images/logo/ecommerce_logo.png') }}" 
                alt="Ecommerce Logo">

            {{-- Navbar Items --}}
            <div 
                x-data="{ productsShow: false, blogShow: false }" 
                class="relative hidden sm:block text-gray-500">
                
                <ul class="flex flex-row space-x-4">
                    <li><a wire:navigate href="{{ route('home') }}">Home</a></li>
                    <li><a wire:navigate href="{{ route('products') }}">Products</a></li>
                    <li><a wire:navigate href="{{ route('contact.us') }}">Contact Us</a></li>
                    <li><a wire:navigate href="{{ route('news') }}">News</a></li>

                    {{--<button @click="productsShow = !productsShow">
                        <li><a href="#">Categories</a></li>
                    </button>--}}

                    {{-- products categories --}}
                    {{--<livewire:dropdowns.categories-dropdown />--}}
        

                    <button @click="blogShow = !blogShow">
                        <li><a href="#">Brands</a></li>
                    </button>
                    {{-- brands --}}
                    <livewire:dropdowns.brands-dropdowns />

                </ul>
            </div>

            <div class="space-x-3 flex">

                {{-- Image Profile --}}
                <!--<div x-data="{ openProfile: false }" class="pt-2 relative">

                    {{-- image button --}}
                    <button @click="openProfile = !openProfile"
                        class="block w-10 h-10 rounded-full overflow-hidden border-2 border-white focus:outline-none focus:border-purple-500">
                        <img 
                            class="h-full w-full object-cover" 
                            src="{{ asset('assets/images/users/user_profile.png') }}" 
                            alt="User Image"
                            >
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

                </div>-->
                <livewire:dropdowns.profile-dropdown />

                {{-- shoppingcart --}}
                <livewire:shoppingcarts.shoppingcart-dropdown />
                
                {{-- wishlist --}}
                <livewire:wishlists.wishlist-dropdown />

                {{-- bar menu --}}
                <div class="relative sm:hidden">
                    <button @click="responsiveNav = !responsiveNav">
                        <i class="fa-solid fa-bars py-3 pl-2 mt-4"></i>
                    </button>
                </div>

            </div>

        </div>

    </nav>

    {{-- Responsive Menu --}}
    <div x-show="responsiveNav" @click.outside="responsiveNav = false" x-cloak>
    
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a wire:navigate href="{{ route('home') }}">Home</a>
        </div>
        
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a wire:navigate href="{{ route('products') }}">Products</a>
        </div>
        
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a wire:navigate href="{{ route('contact.us') }}">Contact Us</a>
        </div>
        
        <!--<div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a href="">Categories</a>
        </div>-->

        <!--<div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a href="">Blog</a>
        </div>-->

    </div>

</header>