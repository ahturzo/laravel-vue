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

// vue axios
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// ckeditor
import CKEditor from 'ckeditor4-vue';
Vue.use(CKEditor);

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

// dropify
import VueDropify from 'vue-dropify';
export default {
    components: {
        'vue-dropify': VueDropify
    }
}

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
    mode: 'history',
    routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    store,
});
