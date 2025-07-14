<style>
    .chat-widget {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        font-family: 'Nunito', sans-serif;
    }

    .chat-header {
        background-color: #004990;
        color: white;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        font-weight: bold;
        cursor: pointer;
    }

    .chat-body {
        height: 300px;
        overflow-y: auto;
        padding: 10px;
    }

    .chat-message {
        margin-bottom: 10px;
        padding: 8px 10px;
        border-radius: 8px;
        max-width: 80%;
        word-wrap: break-word;
    }

    .chat-message.sender {
        background-color: #dbeafe;
        align-self: flex-end;
        text-align: right;
    }

    .chat-message.receiver {
        background-color: #f3f4f6;
        align-self: flex-start;
        text-align: left;
    }

    .chat-footer {
        display: flex;
        border-top: 1px solid #e2e8f0;
        padding: 8px;
    }

    .chat-footer input {
        flex: 1;
        padding: 6px 10px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        margin-right: 5px;
    }

    .chat-footer button {
        background-color: #004990;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
    }
</style>

<div class="chat-widget" x-data="{ open: true }">
    <div class="chat-header" @click="open = !open">
        Chat
    </div>

    <div class="chat-body" x-show="open" id="chat-messages">
        <!-- Messages loaded here -->
    </div>

    <div class="chat-footer" x-show="open">
        <input type="text" id="chat-input" placeholder="Type your message..." />
        <button id="send-btn">Send</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const messagesEl = document.getElementById('chat-messages');
    const inputEl = document.getElementById('chat-input');
    const sendBtn = document.getElementById('send-btn');

    let receiverId = null;

    axios.get('/messages').then(response => {
        response.data.forEach(msg => appendMessage(msg));
        messagesEl.scrollTop = messagesEl.scrollHeight;
    });

    sendBtn.addEventListener('click', () => {
        if (!inputEl.value.trim() || !receiverId) return;

        axios.post('/messages', {
            receiver_id: receiverId,
            message: inputEl.value.trim(),
        }).then(response => {
            appendMessage(response.data);
            inputEl.value = '';
            messagesEl.scrollTop = messagesEl.scrollHeight;
        });
    });

    function appendMessage(msg) {
        const div = document.createElement('div');
        div.classList.add('chat-message');
        div.classList.add(msg.sender_id === {{ auth()->id() }} ? 'sender' : 'receiver');
        div.innerText = msg.message;
        messagesEl.appendChild(div);

        // Set receiver_id based on the other party in first message
        if (!receiverId) {
            receiverId = msg.sender_id === {{ auth()->id() }} ? msg.receiver_id : msg.sender_id;
        }
    }

    window.Echo.channel('chat.{{ auth()->id() }}')
        .listen('.message.sent', (e) => {
            appendMessage(e.message);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        });
});
</script>
