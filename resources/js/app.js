/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$(document).ready(function() {
	var s = $(".navbar-light");
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();

	    if (scroll >=200) {
	        s.addClass("fixed-top");
	    } else {
	        s.removeClass("fixed-top");
	    }
    });
});

$(document).ready(function() {     
    $('.dropdown-toggle').hover(function(){     
        $('.dropdown-menu').addClass('show');    
    },     
    function(){    
        $('.dropdown-menu').removeClass('show');     
    });
}); 

$(document).ready(function() {
	var s = $(".mj-nav-section ");
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();

	    if (scroll >=5) {
	        s.addClass("short-nav");
	    } else {
	        s.removeClass("short-nav");
	    }
    });
});

$(document).ready(function(){
   $('.txtShowDiv').focus(function(){
       $('.mg-ul-hidden').fadeIn(1000);
   }).focusout(function(){
       $('.mg-ul-hidden').fadeOut(1000);
   });
});