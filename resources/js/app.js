const chatAppDiv = document.getElementById('chat-app');
const username = chatAppDiv.dataset.username;

const app = createApp(App);
app.provide('username', username); // Make username available to child components
app.mount('#chat-app');