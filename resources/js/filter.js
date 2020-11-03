import moment from 'moment'
import Vue from 'vue'
Vue.filter('dateFormat', (arg) =>{
    return moment(arg).format("Do MMMM YYYY")
})

Vue.filter('shortLength', function(text, length, suffix){
    return text.substring(0,length)+suffix;
})
