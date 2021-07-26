import Profile from './components/Profile.vue';
import Dashboard from './components/Dashboard.vue';
import Users from './components/Users.vue';
import Platforms from './components/Platforms.vue';
import VueRouter from 'vue-router';
import Vue from 'vue';
import DressbarnPlatforms from './components/platforms/DressbarnPlatforms.vue';
import Pier1Platforms from './components/platforms/Pier1Platforms.vue';
import SteinMartPlatforms from './components/platforms/SteinMartPlatforms.vue';
import ModellsPlatforms from './components/platforms/ModellsPlatforms.vue';
import RadioShackPlatforms from './components/platforms/RadioShackPlatforms.vue';
import FarmersCartPlatforms from './components/platforms/FarmersCartPlatforms.vue';
import FranklinMintPlatforms from './components/platforms/FranklinMintPlatforms.vue';
import LinensNThingsPlatforms from './components/platforms/LinensNThingsPlatforms.vue';
import Posts from './components/Posts.vue';



/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

// VForm
import Form from 'vform'; 
import { HasError, AlertError } from 'vform/src/components/bootstrap4';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;

//Vue Progress Bar
import VueProgressBar from 'vue-progressbar';
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
  }  
Vue.use(VueProgressBar, options);

//Sweet Alert
import Swal from 'sweetalert2';
window.swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
window.toast = Toast; 

//Pagination laravel-vue-pagination
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter);

// Vue Routes
const routes = [
    { path: '/dashboard', component: Dashboard },
    { path: '/profile', component: Profile },
    { path: '/users', component: Users },
    { 
      path: '/platforms', 
      component: Platforms, 
      children: [
        {
          // Brand Specific Platforms will be rendered inside User's <router-view>
          // when /platforms/:id/{brand} is matched
          path: 'dressbarn',
          name: 'DressbarnPlatforms',
          component: DressbarnPlatforms
        },
        {
          path: 'pier1',
          name: 'Pier1Platforms',
          component: Pier1Platforms
        },
        {
          path: 'steinmart',
          name: 'SteinMartPlatforms',
          component: SteinMartPlatforms
        },
        {
          path: 'modells',
          name: 'ModellsPlatforms',
          component: ModellsPlatforms
        },
        {
          path: 'radioshack',
          name: 'RadioShackPlatforms',
          component: RadioShackPlatforms
        },
        {
          path: 'franklinmint',
          name: 'FranklinMintPlatforms',
          component: FranklinMintPlatforms
        },
        {
          path: 'farmerscart',
          name: 'FarmersCartPlatforms',
          component: FarmersCartPlatforms
        },
        {
          path: 'linensnthings',
          name: 'LinensNThingsPlatforms',
          component: LinensNThingsPlatforms
        }
      ]
    },
    { path: '/posts', component: Posts }
]

const router = new VueRouter({
    mode: 'history',
    routes   //short for routes: routes in old JavaScript
    
})

// Global Filters 
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

let Fire = new Vue();
window.Fire = Fire;
//same thing: window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('Profile', require('./components/ExampleComponent.vue').default);
Vue.component('Dashboard', require('./components/Dashboard.vue').default);
Vue.component('Users', require('./components/Users.vue').default);
Vue.component('Platforms', require('./components/Platforms.vue').default);
Vue.component('DressbarnPlatforms', require('./components/platforms/DressbarnPlatforms.vue').default);
Vue.component('Posts', require('./components/Posts.vue').default);
//Vue.component('PlatformsForm', require('./components/PlatformsForm.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
