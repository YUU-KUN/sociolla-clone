/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import App from './App.vue';
import store from './store';
import VueAxios from 'vue-axios';
import axios from 'axios';
import router from './routes';
import BootstrapVue from 'bootstrap-vue';
import VueCurrency from 'vue-currency-filter'

import '../../public/assets/js/jquery.min.js'
import '../../public/assets/js/jquery-ui.min.js'
import '../../public/assets/js/popper.min.js'
// import '../../public/assets/js/active.js'
// import '../../public/assets/js/easing.js'
// import '../../public/assets/js/fancybox.min.js'
// import '../../public/assets/js/finalcountdown.min.js'
// import '../../public/assets/js/flex-slider.js'
// import '../../public/assets/js/gmap.min.js'
// import '../../public/assets/js/jquery-migrate-3.0.0.js'
// import '../../public/assets/js/jquery-ui.min.js'
// import '../../public/assets/js/magnific-popup.js'
// import '../../public/assets/js/map-script.js'
// import '../../public/assets/js/nicesellect.js'
// import '../../public/assets/js/onepage-nav.min.js'
// import '../../public/assets/js/owl-carousel.js'
// import '../../public/assets/js/scrollup.js'
// import '../../public/assets/js/slicknav.min.js'
// import '../../public/assets/js/waypoints.min.js'
// import '../../public/assets/js/ytplayer.min.js'

// CSS
import '../../public/assets/css/bootstrap.css'
import '../../public/assets/css/reset.css'
import '../../public/assets/css/style.css'
import '../../public/assets/css/responsive.css'

import '../../public/assets/css/magnific-popup.min.css'
import '../../public/assets/css/font-awesome.css'
import '../../public/assets/css/jquery.fancybox.min.css'
import '../../public/assets/css/themify-icons.css'
import '../../public/assets/css/animate.css'
import '../../public/assets/css/flex-slider.min.css'
import '../../public/assets/css/owl-carousel.css'

import '../../public/assets/css/niceselect.css'
import '../../public/assets/css/slicknav.min.css'


axios.defaults.baseURL = 'http://localhost:8000/api/';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueCurrency, {
    name: 'rupiah',
    symbol : 'Rp',
    thousandsSeparator: '.',
    fractionCount: 2,
    fractionSeparator: ',',
    symbolPosition: 'front',
    symbolSpacing: true,
    avoidEmptyDecimals: undefined,
})

Vue.use(BootstrapVue)
Vue.use(VueAxios, axios)

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
