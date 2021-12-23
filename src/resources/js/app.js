import './bootstrap'
import Vue from 'vue'
import Vuetify from './plugins/vuetify'
import SideNav from './components/SideNav'

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    components: {
        SideNav
    }
})