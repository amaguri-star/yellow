import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import VueDatePicker from './components/VueDatePicker'

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    components: {
        VueDatePicker,
    }
})