
require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes.js';
import store from './vuex'

window.Vue = require('vue');

Vue.component('parent', require('./components/Parent.vue').default);
Vue.component('navbar', require('./components/NavComponent.vue').default);

const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router,
    store
});
