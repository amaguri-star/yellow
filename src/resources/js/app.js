import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import VueRouter from 'vue-router'
import LoginPage from './components/LoginPage'
import SigninPage from './components/SigninPage'
import TaskList from './components/TaskList'
import SideBar from './components/SideBar'
import store from './store/index'
import axios from 'axios'

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
    store,
    vuetify: Vuetify,
    router,
    components: {
        SideBar,
        LoginPage
    },

    created() {
        axios.get('/api/authCheck').then((res) => {
            console.log(res.data)
            this.$store.commit('util/setLogin', true);
            axios.get('/api/me').then((res) => {
                console.log(res.data)
                this.$store.commit('util/setUser', res.data);
            }).catch((res) => {
                console.log("can't get a user info");
            });
        }).catch((res) => {
            console.log(res.data);
        })
    }
})