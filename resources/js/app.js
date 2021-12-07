import Alpine from 'alpinejs';
import Typewriter from 'typewriter-effect/dist/core';
import AOS from 'aos';
import {Fancybox, Carousel, Panzoom} from "@fancyapps/ui";
import {annotate} from 'rough-notation';

window.Alpine = Alpine;
window.Swal = require('sweetalert2/dist/sweetalert2')

document.addEventListener('alpine:init', () => {
    Fancybox.bind('a[data-fancybox]', {
        animated: true,
        showClass: true,
        hideClass: false,

        closeButton: "top",
        dragToClose: false,

        Image: {
            zoom: false,
            fit: "cover",
        },

        Toolbar: false,
        Thumbs: false,

        Carousel: {
            Navigation: true,
            Dots: true,
        },

        on: {
            initLayout: (fancybox) => {
                // Create main container for left panel and Fancybox carousel
                const $mainPanel = document.createElement("div");
                $mainPanel.classList.add("fancybox__main-panel");

                // Create left panel
                const $leftPanel = document.createElement("div");
                $leftPanel.classList.add("fancybox__left-panel");

                // $leftPanel.innerHTML = document.getElementById("gallery-data").innerHTML;
                let element = /(.*)\[([^\]]*)\]/g.exec(fancybox.options.$trigger.dataset['fancybox']);
                if (document.getElementById(`${element[1]}-data[${element[2]}]`)) {
                    $leftPanel.innerHTML = document.getElementById(`${element[1]}-data[${element[2]}]`).innerHTML;
                    $leftPanel.addEventListener('click', function (event) {
                        event.preventDefault();
                        return false;
                    })
                } else {
                    console.error(`Cannot find container ${element[1]}-data[${element[2]}]`)
                }
                $mainPanel.appendChild($leftPanel);
                $mainPanel.appendChild(fancybox.$carousel);

                fancybox.$backdrop.after($mainPanel);
            },
        },
    });

    AOS.init({});
    Alpine.data('typewriter', ($el) => ({
        init: function () {
            new Typewriter($el, {
                strings: ['open-source evangelist', 'web designer', 'SEO expert', 'security expert', 'entrepreneur'],
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
        visible: false,
        init: function () {
            window.addEventListener("scroll", () => {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    this.visible = true;
                } else {
                    this.visible = false;
                }
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    this.visible = true;
                } else {
                    this.visible = false;
                }
            })
        },
        click: function () {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    }));
    Alpine.data('scrollSpy', ($el) => ({
        init: function () {
            var section = document.querySelectorAll(".section h2[id]");
            var sections = {};
            var i = 0;

            Array.prototype.forEach.call(section, function (e) {
                sections[e.id] = getCoords(e).top;
            });

            console.log(sections)
            window.onscroll = function () {
                var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

                for (i in sections) {
                    if (sections[i] <= scrollPosition) {
                        console.log('active:' + i);
                        document.querySelector('.list.active').setAttribute('class', 'list');
                        document.querySelector('a[href*=' + i + ']').parentElement.setAttribute('class', 'list active');
                    }
                }
            };
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

    var top  = box.top +  scrollTop - clientTop;
    var left = box.left + scrollLeft - clientLeft;

    return { top: Math.round(top), left: Math.round(left) };
}

window.scrollSpy = function () {

}
window.highlight = function (element) {
    const type = element.dataset['type'] || "underline"
    annotate(element, {type});
}
Alpine.start();
