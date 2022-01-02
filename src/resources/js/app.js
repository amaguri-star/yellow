import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import VueRouter from 'vue-router'
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
        }
    ]
});

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    router,
    components: {
        SideBar,
    }
})