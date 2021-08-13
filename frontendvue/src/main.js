import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './axios'

import "bootstrap/dist/css/bootstrap.min.css"
import { createApp } from 'vue'



createApp(App).use(router).mount('#app')
