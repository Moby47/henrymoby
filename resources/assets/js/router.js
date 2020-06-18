
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Meta from 'vue-meta'
 
Vue.use(Meta)

import index from './components/index.vue'
import projects from './components/projects.vue'
import services from './components/services.vue'
import blog from './components/blog.vue'
import contact from './components/contact.vue'
import single from './components/single.vue'
import manageBlog from './components/manageBlog.vue'
import manageProject from './components/manageProject.vue'
import reviewLink from './components/reviewLink.vue'
import review from './components/review.vue'
import category from './components/category.vue'
import search from './components/search.vue'
import not_found from './components/not_found.vue'



export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: index,
             meta:{
               // auth: true
            }
        },
        {
            path: '/blog',
            name: 'blog',
            component: blog,
             meta:{
               // auth: true
            }
        },
        {
            path: '/services',
            name: 'services',
            component: services,
             meta:{
               // auth: true
            }
        },
        {
            path: '/projects',
            name: 'projects',
            component: projects,
             meta:{
               // auth: true
            }
        },
        {
            path: '/contact',
            name: 'contact',
            component: contact,
             meta:{
               // auth: true
            }
        },
        {
            path: '/single/:title/:id',
            name: 'single',
            component: single,
             meta:{
               // auth: true
            }
        },
        {
            path: '/manage-blog',
            name: 'manageBlog',
            component: manageBlog,
             meta:{
                auth: true
            }
        },
        {
            path: '/manage-project',
            name: 'manageProject',
            component: manageProject,
             meta:{
                auth: true
            }
        },
        {
            path: '/review-link',
            name: 'reviewLink',
            component: reviewLink,
             meta:{
                auth: true
            }
        },
        {
            path: '/review/:pass',
            name: 'review',
            component: review,
             meta:{
               // auth: true
            }
        },
        {
            path: '/search/:query',
            name: 'search',
            component: search,
             meta:{
               // auth: true
            }
        },
        {
            path: '/category/:type',
            name: 'category',
            component: category,
             meta:{
               // auth: true
            }
        },
        {
            path: '/not-found',
            name: 'not_found',
            component: not_found,
             meta:{
               // auth: true
            }
        },
        {
            path: '*',
            redirect: '/not-found'
        },
    ]
})
