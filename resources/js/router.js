import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import dashboard from './components/dashboard/Index'

const routes = [
    {
        // path: '/home',
        // component: dashboard
    }
]

export default new Router({
    mode: 'history',
    routes
})