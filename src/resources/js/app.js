import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import VueDatePicker from './components/VueDatePicker'
import TaskList from './components/TaskList'

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    components: {
        VueDatePicker,
        TaskList,
    }
})