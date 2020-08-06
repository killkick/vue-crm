import router from './router'
import Vue from 'vue'
import App  from './components/App'
window.Vue = require('vue');
require('./bootstrap')
import {i18n} from './modules/i18n'

const app = new Vue({
    el: '#app',
    i18n,
    components : {
        App
    },
    router
});
