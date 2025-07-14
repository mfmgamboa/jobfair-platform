<template>
  <div class="fixed bottom-4 right-4 z-50 w-80 bg-white shadow-2xl border border-gray-200 rounded-2xl overflow-hidden">
    <div class="bg-[#0b5394] text-white text-lg px-4 py-2 flex justify-between items-center">
      <span>JobQuest Chat</span>
      <button @click="toggleOpen" class="text-white hover:text-gray-200">&times;</button>
    </div>
    <div v-show="isOpen" class="flex flex-col h-96">
      <div class="flex-1 overflow-y-auto p-3 space-y-2 bg-gray-50">
        <div
          v-for="msg in messages"
          :key="msg.id"
          :class="msg.sender_id === userId ? 'text-right' : 'text-left'"
        >
          <div
            :class="[
              'inline-block px-4 py-2 rounded-xl',
              msg.sender_id === userId ? 'bg-[#cfe2f3] text-black' : 'bg-[#0b5394] text-white',
            ]"
          >
            {{ msg.message }}
          </div>
        </div>
      </div>
      <form @submit.prevent="sendMessage" class="border-t border-gray-300 p-2 flex">
        <input
          v-model="newMessage"
          placeholder="Type your message..."
          class="w-full px-3 py-2 text-sm rounded-l-md border border-gray-300 focus:outline-none"
        />
        <button
          type="submit"
          class="bg-[#0b5394] text-white px-4 py-2 text-sm rounded-r-md hover:bg-[#083e6e]"
        >
          Send
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Echo from "laravel-echo";

export default {
  data() {
    return {
      messages: [],
      newMessage: "",
      userId: null,
      isOpen: true,
    };
  },
  methods: {
    toggleOpen() {
      this.isOpen = !this.isOpen;
    },
    fetchMessages() {
      axios.get("/messages").then((res) => {
        this.messages = res.data;
      });
    },
    sendMessage() {
      if (!this.newMessage.trim()) return;

      axios
        .post("/messages", {
          recipient_id: this.messages.find((m) => m.sender_id !== this.userId)?.sender_id || 1,
          message: this.newMessage,
        })
        .then((res) => {
          this.messages.push(res.data.message);
          this.newMessage = "";
        });
    },
    setupEcho() {
      window.Echo.private(`chat.${this.userId}`).listen("MessageSent", (e) => {
        this.messages.push(e.message);
      });
    },
  },
  mounted() {
    axios.get("/api/user").then((res) => {
      this.userId = res.data.id;
      this.fetchMessages();
      this.setupEcho();
    });
  },
};
</script>
 
