import './bootstrap';
import { createApp } from 'vue';
import ChatApp from './components/ChatApp.vue';

const app = createApp(ChatApp);
app.mount('#chat-app');

console.log('Vue ChatApp mounted...');
