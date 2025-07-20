<template>
  <div class="chat-input">
    <!-- Hidden username field for password managers -->
    <input
      type="hidden"
      name="username"
      :value="username"
      autocomplete="username"
    />

    <!-- Message input -->
    <input
      v-model="message"
      @keyup.enter="sendMessage"
      type="text"
      name="message"
      autocomplete="off"
      placeholder="Type a message..."
      autofocus
    />

    <button @click="sendMessage" type="button" aria-label="Send message">
      Send
    </button>
  </div>
</template>

<script>
export default {
  inject: ['username'],
  data() {
    return {
      message: ''
    };
  },
  methods: {
    sendMessage() {
      if (this.message.trim()) {
        this.$emit('send', this.message);
        this.message = '';
      }
    }
  }
};
</script>

<style scoped>
.chat-input {
  display: flex;
  padding: 10px;
  border-top: 1px solid #ccc;
  background: #f1f1f1;
  align-items: center;
}

.chat-input input[type="text"] {
  flex: 1;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  outline: none;
}

.chat-input input[type="text"]:focus {
  border-color: #007bff;
}

.chat-input button {
  margin-left: 10px;
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

.chat-input input[type="hidden"] {
  display: none;
}
</style>