import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axiosInstance from '@/axios'
import store from './store';

import GuestLayout from '@/layouts/GuestLayout.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';

const app = createApp(App);
app.component('guest-layout', GuestLayout)
app.component('auth-layout', AuthLayout)
app.use(router).use(store);
app.config.globalProperties.$url= axiosInstance;
app.mount('#app');

