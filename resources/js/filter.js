import moment from 'moment'
import Vue from 'vue'
Vue.filter('dateFormat', (arg) =>{
    return moment(arg).format("Do MMMM YYYY")
})
