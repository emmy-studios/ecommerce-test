<div>

    @if($navigationLogo->main_logo)

        <img 
            class="h-4 w-25" 
            src="{{ asset('storage/' . $navigationLogo->main_logo) }}" 
            alt="Ecommerce Logo">

    @else

        <img 
            class="h-4 w-25" 
            src="{{ asset('assets/images/logo/ecommerce_logo.png') }}" 
            alt="Ecommerce Logo">
    
    @endif

</div>
