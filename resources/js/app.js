import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue';

import ChatComponent from './components/ChatComponent.vue';
import FloatingChat from './components/FloatingChat.vue';

window.Alpine = Alpine;
Alpine.start();

const chatApp = document.getElementById('chat-app');
if (chatApp) {
    const app = createApp({});
    app.component('chat-component', ChatComponent);
    app.component('floating-chat', FloatingChat);
    app.mount('#chat-app');
}
