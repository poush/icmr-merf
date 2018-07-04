
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

import AutoComplete from 'v-autocomplete'
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-autocomplete/dist/v-autocomplete.css'
Vue.use(AutoComplete)

import VuePaginate from 'vue-paginate'
Vue.use(VuePaginate)

import 'vue-event-calendar/dist/style.css'
import vueEventCalendar from 'vue-event-calendar'
Vue.use(vueEventCalendar, {locale: 'en'}) 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('equipment-search', require('./components/equipments/Search.vue'));
Vue.component('equipment-view', require('./components/equipments/Equipment.vue'));
Vue.component('booking-view', require('./components/Booking.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('institute-select',require('./components/equipments/InstituteSelect.vue'));

const app = new Vue({
    el: '#app',
});
