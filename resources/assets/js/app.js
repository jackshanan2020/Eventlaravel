
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyC0pynm0BiVwm3r85i7YBme5tabouBKaK4',
    libraries: 'places',
  }
})

Vue.component('example', require('./components/Example.vue'));
Vue.component('event-location', require('./components/EventLocation.vue'));
Vue.component('event-registration', require('./components/EventRegistration.vue'));
Vue.component('clock', require('./components/Clock.vue'));
Vue.component('stock', require('./components/Stock.vue'));

const app = new Vue({
    el: '#app'
});
