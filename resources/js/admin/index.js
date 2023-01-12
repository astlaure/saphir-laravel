import axios from 'axios';
import { createApp } from 'vue';
import App from './App.vue';
import { router } from './router';

axios.defaults.baseURL = window.saphir.api;

const app = createApp(App);

app.use(router);
app.mount('#root');
