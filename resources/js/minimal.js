import Alpine from 'alpinejs';
window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('typewriter', ($el) => ({
    }))
    Alpine.data('loading', ($el) => ({
        show: true,
        init: function () {
            this.show = false;
        }
    }))
    Alpine.data('scrollToTop', () => ({
        visibleScrollToTop: false
    }));
    Alpine.data('highlight', () => ({
        show: function() {

        }
    }));
})
Alpine.start();
