require('./bootstrap');
window.Vue = require('vue');

//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';
Vue.component('admin-master', require('./components/backend/AdminMaster.vue').default);


const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router
});
