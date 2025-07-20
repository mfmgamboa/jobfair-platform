// Import dependencies
import 'bootstrap'; // Optional: if you're using Bootstrap JS
import axios from 'axios';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Attach Axios to window (for global use)
window.axios = axios;

// Set default headers for Axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ✅ Attach CSRF token
document.addEventListener('DOMContentLoaded', () => {
    const token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
        console.error("CSRF token not found in <meta>. Make sure it's present in your layout.");
    }
});

// ✅ Initialize Laravel Echo + Pusher
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY || 'your-pusher-key',
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER || 'mt1',
    forceTLS: true,
});