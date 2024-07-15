<div>

    @if($footerIcon->main_logo)

        <a href="{{ route('home') }}">
            <img 
                class="w-auto h-7" 
                src="{{ asset('storage/' . $footerIcon->main_logo) }}" 
                alt="Ecommerce Logo"
                >
        </a>

    @else

        <a href="{{ route('home') }}">
            <img 
                class="w-auto h-7" 
                src="{{ asset('assets/images/logo/ecommerce_logo.png') }}" 
                alt="Ecommerce Logo"
                >
        </a>

    @endif

</div>
