<template>
  <div id="app">
    <router-view />

    <!-- Floating Chat Button -->
    <ChatFloatingButton @toggle="toggleChat" />

    <ChatWindow
      v-if="isChatOpen"
      :is-visible="isChatOpen"
      :user-id="activeUserId"
      :username="activeUser?.name"
      @close="isChatOpen = false"
    />

    <!-- Chat List -->
    <ChatList
      v-if="isChatOpen"
      :is-visible="isChatOpen"
      @select="selectedUserId = $event"
      @close="isChatOpen = false"
    />
  </div>
</template>

<script>
import ChatFloatingButton from './components/chat/ChatFloatingButton.vue';
import ChatWindow from './components/chat/ChatWindow.vue';
import ChatList from './components/chat/ChatList.vue';

export default {
  components: {
    ChatFloatingButton,
    ChatWindow,
    ChatList
  },
  data() {
    return {
      isChatOpen: false,
      activeUserId: null
    };
  },
  methods: {
    toggleChat() {
      this.isChatOpen = !this.isChatOpen;
    }
  },
  watch: {
    selectedUserId(newId) {
      this.activeUserId = newId;
    }
  }
};
</script>

<style scoped>
#app {
  display: flex;
  height: 100vh;
}

/* Mobile Toggle */
@media (max-width: 768px) {
  .chat-window {
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    border-radius: 0;
  }

  .chat-list {
    width: 100%;
    right: 0;
    bottom: 0;
    height: 100%;
    max-height: 100%;
    border-top: 1px solid #ddd;
    transform: translateX(100%);
    transition: transform 0.3s ease;
  }

  .chat-list.visible {
    transform: translateX(0);
  }
}
</style>