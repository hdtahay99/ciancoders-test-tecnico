/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

 import 'owl.carousel';

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Catalogo');
require('./components/CatalogoBoton');
require('./components/CatalogoCreate');
require('./components/Categoria');



jQuery(document).ready(function() {
    jQuery('.owl-carousel').owlCarousel({
        margin:10,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0 : {
                items: 1
            }, 
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});