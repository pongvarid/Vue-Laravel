import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';
import routes from './router/index';

import store from './store/vuex'; 
import Vuesax from 'vuesax';
Vue.use(Vuesax)

import Input  from '@c/MbsComponent/Input';
Vue.component('Input', Input)
import './assets/css/mbs.css'; 
import './assets/css/custom.css'; 
import './assets/css/position.css';
import './assets/css/size.css'; 
import './assets/css/color.css'; 

import 'vuesax/dist/vuesax.css' //Vuesax styles
import 'material-icons/iconfont/material-icons.css';
import BootstrapVue from 'bootstrap-vue' 
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'animate.css'
import VueFloatLabel from "vue-float-label";
//import FloatingLabel from 'vue-simple-floating-labels'
import "@mdi/font/css/materialdesignicons.min.css"
 
import VModal from 'vue-js-modal'
import VueSweetalert2 from 'vue-sweetalert2';
import vSelect from 'vue-select'
import Multiselect from 'vue-multiselect'
Vue.component('le-select', vSelect)
Vue.use(VueSweetalert2);
 
Vue.use(VModal,{ dialog: true })
Vue.use(VueFloatLabel);

Vue.use(BootstrapVue); 
Vue.component('pagination', require('laravel-vue-pagination'));
//Vue.use(VueRouter);
Vue.use(VueRouter)
const router = new VueRouter({
    routes 
});
Vue.component('multiselect', Multiselect)
window.events = new Vue();

window.flash = function(message, type = 'success') {
    window.events.$emit('flash', message, type);
};

require('./bootstrap')
window.Vue = require('vue');
 
new Vue({
    el: '#app',
    router, 
    store: store,  
    render: h => h(App),
   
    mounted(){
        Echo.channel('noti-channel')
        .listen('NotificationEvent', (e) => {
            console.log('notification ready');
        });
    }
});