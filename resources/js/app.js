require('./bootstrap');
window.Vue = require('vue');

// vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index";
const store = new Vuex.Store(
    storeData
)

// support moment js
import {filter} from './filter'

//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';
Vue.component('admin-master', require('./components/backend/AdminMaster.vue').default);

// vform
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;

// toaster
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;

const router = new VueRouter({
    mode: 'hash',
    routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    store
});
