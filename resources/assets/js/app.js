
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/* ------------------------- Imports -------------------- */


//vee validate
import Vue from 'vue';
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

//toated
// register the plugin on vue
import Toasted from 'vue-toasted';
Vue.use(Toasted, {
    duration: 5000
})
// you can also pass options, check options reference below
//Vue.use(Toasted, Options)

//animate.css
require('vue2-animate/dist/vue2-animate.min.css')

//vur router
import router from './router'


//vuetify
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)




/* ------------------------- Imports -------------------- */


router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.name) {
      // Start the route progress bar.
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  // Complete the animation of the route progress bar.
  NProgress.done()
})




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 
//route middleware 
router.beforeEach((to, from, next) => {

        if(to.matched.some(record => record.meta.auth)){
    
if(localStorage.getItem('token')){
    //continue
    next()
}else{
    //redirect
    next({path: '/'})
} //inner if close

        }else{
         //no auth required for this page
            next()
        } //main if close

    } //func closure
) //router close
// route middleware 
 
//main pages
Vue.component('index', require('./components/index.vue'));
Vue.component('contact', require('./components/contact.vue'));
Vue.component('blog', require('./components/blog.vue'));
Vue.component('projects', require('./components/projects.vue'));
Vue.component('services', require('./components/services.vue'));
//parts
Vue.component('auth', require('./components/parts/auth.vue'));
Vue.component('foot', require('./components/parts/foot.vue'));
Vue.component('menubar', require('./components/parts/menubar.vue'));
Vue.component('floatings', require('./components/parts/floatings.vue'));
Vue.component('share', require('./components/parts/share.vue'));
//contents
Vue.component('blogcon', require('./components/contents/blogcon.vue'));
Vue.component('indexcon', require('./components/contents/indexcon.vue'));
Vue.component('singlecon', require('./components/contents/singlecon.vue'));
Vue.component('servicescon', require('./components/contents/servicescon.vue'));
Vue.component('projectscon', require('./components/contents/projectscon.vue'));
Vue.component('contactcon', require('./components/contents/contactcon.vue'));
Vue.component('manageblogcon', require('./components/contents/manageblogcon.vue'));
Vue.component('manageprojectcon', require('./components/contents/manageprojectcon.vue'));
Vue.component('categorycon', require('./components/contents/categorycon.vue'));
Vue.component('searchcon', require('./components/contents/searchcon.vue'));

const app = new Vue({
    el: '#app',
    router
});
