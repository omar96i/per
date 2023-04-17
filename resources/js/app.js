import { createApp } from 'vue';
import UserIndex from './components/User/Index.vue';

const app = createApp({});

app.component('user-index', UserIndex);
app.mount('#app');
