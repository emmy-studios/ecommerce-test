import './bootstrap';

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()

document.addEventListener("alpine:init", () => {
    Alpine.data("layout", () => ({
        profileOpen: false,
        asideOpen: true,
    }));
});