/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'
import booking from "./components/booking/booking.vue"
import navbar from "./components/navbar.vue"

Vue.use(Vuex);

import { STORE } from './store/index'
import WebService from "./web";
WebService.init();

const app = new Vue({
    el: '#app',
    store: STORE,
    components: {
        booking,
        navbar
    }
});


$(document).ready(function () {
    var s = $(".navbar-light");
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            s.addClass("fixed-top");
        } else {
            s.removeClass("fixed-top");
        }
    });
});

$(document).ready(function () {
    $('.dropdown-toggle').hover(function () {
        $('.dropdown-menu').addClass('show');
    },
        function () {
            $('.dropdown-menu').removeClass('show');
        });
});

$(document).ready(function () {
    var s = $(".mj-nav-section ");
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 5) {
            s.addClass("short-nav");
        } else {
            s.removeClass("short-nav");
        }
    });
});

$(document).ready(function () {
    $('.txtShowDiv').focus(function () {
        $('.mg-ul-hidden').fadeIn(1000);
    }).focusout(function () {
        $('.mg-ul-hidden').fadeOut(1000);
    });
});
