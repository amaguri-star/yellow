import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import TaskList from './components/TaskList'

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    components: {
        TaskList,
    }
})