import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
	Alpine.data('typewriter', () => ({
	}));
	Alpine.data('loading', () => ({
		show: true,
		init() {
			this.show = false;
		},
	}));
	Alpine.data('projectDetails', () => ({
		visible: false, scrollShadow: true, hide() {
		}, init() {
		},
	}));

	Alpine.data('scrollToTop', () => ({
		visibleScrollToTop: false,
	}));
	Alpine.data('highlight', () => ({
		show() {

		},
	}));
});
Alpine.start();
