<template>
  <div class="chat-window" v-if="isVisible">
    <div class="chat-header">
      <span>Live Chat</span>
      <button @click="closeChat" class="close-btn" aria-label="Close chat">
        ✖
      </button>
    </div>
    <div class="chat-body" ref="chatBody">
      <div v-for="message in messages" :key="message.id" class="message">
        <strong>{{ message.user?.name }}:</strong> {{ message.body }}
      </div>
    </div>
    <ChatInput
      v-model:message="inputMessage"
      @send="handleSendMessage"
      :user-id="userId"
      :username="username"
    />
  </div>
</template>

<script>
import ChatInput from './ChatInput.vue';
import axios from 'axios';

export default {
  components: {
    ChatInput
  },
  props: {
    isVisible: {
      type: Boolean,
      default: false
    },
    userId: {
      type: [Number, String],
      required: true
    },
    username: {
      type: String,
      default: null
    }
  },
  data() {
    return {
      messages: [],
      inputMessage: '',
      unreadCount: 0
    };
  },
  created() {
    this.fetchMessages();
    this.listenForNewMessages();
  },
  methods: {
    fetchMessages() {
      axios.get(`/api/messages?user_id=${this.userId}`).then(res => {
        this.messages = res.data;
      });
    },
    handleSendMessage(message) {
      axios.post('/api/messages', {
        body: message,
        receiver_id: this.userId
      }).catch(err => {
        console.error(err);
      });
    },
    listenForNewMessages() {
      window.Echo.private(`chat.${this.userId}`)
        .listen('.message.sent', (e) => {
          this.messages.push(e.message);
          this.$nextTick(() => {
            this.$refs.chatBody.scrollTop = this.$refs.chatBody.scrollHeight;
          });
        });
    },
    closeChat() {
      this.$emit('close');
    }
  }
};
</script>

<style scoped>
.chat-window {
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 300px;
  height: 400px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  border: 1px solid #ddd;
  z-index: 9999;
}

.chat-header {
  background-color: #007bff;
  color: white;
  padding: 10px;
  font-weight: bold;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.chat-body {
  flex: 1;
  padding: 10px;
  overflow-y: auto;
  background: #f9f9f9;
}

.message {
  margin: 5px 0;
  padding: 8px;
  background: #e9ecef;
  border-radius: 5px;
  max-width: 90%;
}

.chat-input {
  display: flex;
  padding: 10px;
  border-top: 1px solid #ccc;
  background: #f1f1f1;
}

.chat-input input {
  flex: 1;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
}

.chat-input button {
  margin-left: 5px;
  padding: 8px 12px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.chat-input button:hover {
  background: #0056b3;
}

.close-btn {
  background: none;
  border: none;
  color: white;
  font-size: 16px;
  cursor: pointer;
}
</style>