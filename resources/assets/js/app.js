
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';

window.Vue = require('vue');
Vue.use(ElementUI);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('top', require('./components/Top.vue'));
Vue.component('slide', require('./components/Slide.vue'));
Vue.component('material-table', require('./components/MaterialTable.vue'));
Vue.component('search-material-table', require('./components/SearchMaterialTable.vue'));
Vue.component('st-form-select', require('./components/StFormSelect.vue'));
Vue.component('st-form-number', require('./components/StFormNumber.vue'));
Vue.component('or-form-select', require('./components/OrFormSelect.vue'));
Vue.component('st-form-supplier-select', require('./components/OrFormSupplierSelect.vue'));
Vue.component('or-form-number', require('./components/OrFormNumber.vue'));

const app = new Vue({
    el: '#app'
});
