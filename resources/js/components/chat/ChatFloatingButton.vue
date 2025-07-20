<template>
  <div class="floating-chat" @click="toggleChat">
    💬
    <span v-if="unreadCount > 0" class="badge">{{ unreadCount }}</span>
  </div>
</template>

<script>
export default {
  data() {
    return {
      unreadCount: 3
    };
  },
  methods: {
    toggleChat() {
      this.$emit('toggle');
    }
  }
};
</script>

<style scoped>
.floating-chat {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #007bff;
  color: white;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  transition: transform 0.2s;
}
.floating-chat:hover {
  transform: scale(1.1);
}
.badge {
  position: absolute;
  top: -5px;
  right: -5px;
  background-color: red;
  color: white;
  border-radius: 50%;
  padding: 2px 6px;
  font-size: 12px;
}
</style>