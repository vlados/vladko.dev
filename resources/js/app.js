import Alpine from 'alpinejs';
import Typewriter from 'typewriter-effect/dist/core';
import AOS from 'aos';
import {Fancybox} from "@fancyapps/ui/src/Fancybox/Fancybox";
import {annotate} from 'rough-notation';
import Swal from 'sweetalert2/src/sweetalert2';
window.Alpine = Alpine;
window.Swal = Swal

document.addEventListener('alpine:init', () => {
    Fancybox.bind('a[data-fancybox]', {
        dragToClose: false,

        Toolbar: false,
        closeButton: "top",

        Image: {
            zoom: false,
        },
        Carousel: {
            'friction' : 0.8
        },

        on: {
            initCarousel: (fancybox) => {
                const slide = fancybox.Carousel.slides[fancybox.Carousel.page];
            },
            "Carousel.change": (fancybox, carousel, to, from) => {
                const slide = carousel.slides[to];
            },
        },
    });

    AOS.init({});
    Alpine.data('typewriter', ($el) => ({
        init: function () {
            new Typewriter($el, {
                strings: ['Full-stack web developer', 'open-source evangelist', 'web designer', 'SEO expert', 'security expert', 'entrepreneur'],
                delay: 75,
                autoStart: true,
                loop: true
            });
        }
    }))
    Alpine.data('loading', ($el) => ({
        show: true,
        init: function () {
            this.show = false;
        }
    }))
    Alpine.data('highlight', () => ({
        show: function () {
            this.$nextTick(() => {
                annotate(this.$refs['el1'], {type: 'underline'}).show();
                annotate(this.$refs['el2'], {type: 'box', color: 'red'}).show();
                annotate(this.$refs['el3'], {type: 'highlight', color: 'yellow'}).show();
            })
        }
    }));
    Alpine.data('scrollToTop', () => ({
        visibleScrollToTop: false,
        init: function () {
            window.addEventListener("scroll", () => {
                if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
                    this.visibleScrollToTop = true;
                } else {
                    this.visibleScrollToTop = false;
                }
            })
        },
        clickTop: function () {
            document.body.scrollTop = 0; // For Safari
            document.location.hash = "";
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    }));
})

function getCoords(elem) { // crossbrowser version
    var box = elem.getBoundingClientRect();

    var body = document.body;
    var docEl = document.documentElement;

    var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
    var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

    var clientTop = docEl.clientTop || body.clientTop || 0;
    var clientLeft = docEl.clientLeft || body.clientLeft || 0;

    var top = box.top + scrollTop - clientTop;
    var left = box.left + scrollLeft - clientLeft;

    return {top: Math.round(top), left: Math.round(left)};
}

window.scrollSpy = function () {

}
window.highlight = function (element) {
    const type = element.dataset['type'] || "underline"
    annotate(element, {type});
}
Alpine.start();
