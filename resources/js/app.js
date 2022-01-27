import Alpine from 'alpinejs';
import Typewriter from 'typewriter-effect/dist/core';
import AOS from 'aos';
import {Fancybox} from '@fancyapps/ui/src/Fancybox';
import {Panzoom} from '@fancyapps/ui/src/Panzoom';
import {Controls} from '@fancyapps/ui/src/Panzoom/plugins/Controls/Controls';
import Swal from 'sweetalert2/src/sweetalert2';
import {annotate} from 'rough-notation';

window.Alpine = Alpine;
window.Swal = Swal;

document.addEventListener('alpine:init', () => {
	if (document.getElementsByClassName('panzoom')[0] instanceof HTMLElement) {
		const panzoom = new Panzoom(document.getElementsByClassName('panzoom')[0], {
			Controls: {
				l10n: {
					ZOOMIN: 'Zoom in', ZOOMOUT: 'Zoom out',
				},

				buttons: ['zoomIn', 'zoomOut'], tpl: {
					zoomIn: '<svg tabindex="-1" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4V20M20 12L4 12" /></svg>',
					zoomOut: '<svg tabindex="-1" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 12H4" /></svg>',
				},
			},
		});
		panzoom.zoomIn(0.5);
		const panzoomControls = new Controls(panzoom);
		panzoomControls.createContainer();
	}

	Fancybox.bind('a[data-fancybox]', {});

	AOS.init({});
	Alpine.data('typewriter', ($el) => ({
		init() {
			new Typewriter($el, {
				strings: ['Full-stack web developer', 'open-source evangelist', 'web designer', 'SEO expert', 'security expert', 'entrepreneur'],
				delay: 75,
				skipAddStyles: true,
				autoStart: true,
				loop: true,
			});
		},
	}));
	Alpine.data('loading', () => ({
		show: true, init() {
			this.show = false;
		},
	}));
	Alpine.data('highlight', () => ({
		show() {
			this.$nextTick(() => {
				annotate(this.$refs.el1, {type: 'underline'}).show();
				annotate(this.$refs.el2, {type: 'box', color: 'red'}).show();
				annotate(this.$refs.el3, {type: 'highlight', color: 'yellow'}).show();
			});
		},
	}));
	Alpine.data('scrollToTop', () => ({
		visibleScrollToTop: false, init() {
			window.addEventListener('scroll', () => {
				if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
					this.visibleScrollToTop = true;
				} else {
					this.visibleScrollToTop = false;
				}
			});
		}, clickTop() {
			document.body.scrollTop = 0; // For Safari
			document.location.hash = '';
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		},
	}));
	Alpine.data('projectDetails', () => ({
		visible: false, scrollShadow: true, hide() {
			this.visible = false;
			document.body.style.overflow = '';
			window['Livewire'].emit('hide-modal');
		}, init() {
		},
	}));
});

// function getCoords(elem) { // cross browser version
//   const box = elem.getBoundingClientRect();
//
//   const { body } = document;
//   const docEl = document.documentElement;
//
//   const scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
//   const scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;
//
//   const clientTop = docEl.clientTop || body.clientTop || 0;
//   const clientLeft = docEl.clientLeft || body.clientLeft || 0;
//
//   const top = box.top + scrollTop - clientTop;
//   const left = box.left + scrollLeft - clientLeft;
//
//   return { top: Math.round(top), left: Math.round(left) };
// }

window.highlight = (element) => {
	let t;
	t = element.dataset.type || 'underline';
	annotate(element, {"type": t});
};

window.loadProject = (id) => {
	window.dispatchEvent(new CustomEvent('project-modal', {
		detail: {
			visibility: true,
		},
	}));
	window['Livewire'].emit('project-modal', id);
	window['gtag']('event', 'viewProject',{
		'id': id
	});
	document.body.style.overflow = 'hidden';
};
Alpine.start();
