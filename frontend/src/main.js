import { createApp } from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import axios from 'axios'
import 'bootstrap'
import{library} from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import {faFacebook, faGoogle,faTwitter} from '@fortawesome/free-brands-svg-icons';



library.add(faFacebook, faGoogle, faTwitter);
axios.defaults.baseURL="http://localhost:8080/"

const app =createApp(App);
app.use(router);
app.mount('#app');
app.component('font-awesome-icon',FontAwesomeIcon);
