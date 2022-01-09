import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import VueRouter from 'vue-router'
import LoginPage from './components/LoginPage'
import SigninPage from './components/SigninPage'
import TaskList from './components/TaskList'
import SideBar from './components/SideBar'


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/tasks',
            name: 'task.list',
            component: TaskList,
            props: true,
        },

        {
            path: '/login',
            name: 'login',
            component: LoginPage,
        },

        {
            path: '/signin',
            name: 'signin',
            component: SigninPage,
        }
    ]
});

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    router,
    components: {
        SideBar,
        LoginPage
    }
})