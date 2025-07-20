<template>
  <div class="chat-list" :class="{ 'visible': isVisible }">
    <div class="chat-list-header">
      Messages
      <button class="close-btn" @click="$emit('close')">✖</button>
    </div>
    <div class="chat-users">
      <div 
        v-for="user in users" 
        :key="user.id" 
        class="chat-user" 
        @click="startChat(user)"
      >
        <div class="user-avatar">
          {{ user.name.charAt(0).toUpperCase() }}
        </div>
        <div class="user-info">
          <div class="user-name">{{ user.name }}</div>
          <div class="user-last-message">{{ user.last_message || 'No messages yet' }}</div>
        </div>
        <div v-if="user.unread > 0" class="unread-badge">{{ user.unread }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    isVisible: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      users: [
        {
          id: 1,
          name: 'JobSeeker',
          last_message: 'Hi, I’m looking for a job!',
          unread: 2
        },
        {
          id: 2,
          name: 'Employer',
          last_message: 'We’re hiring!',
          unread: 0
        }
      ]
    };
  },
  methods: {
    startChat(user) {
      this.$emit('select', user.id);
    }
  }
};
</script>

<style scoped>
.chat-list {
  width: 300px;
  background: #f8f9fa;
  border-right: 1px solid #ddd;
  display: flex;
  flex-direction: column;
  position: fixed;
  bottom: 80px;
  right: 340px;
  height: 400px;
  z-index: 9998;
  transform: translateX(100%);
  transition: transform 0.3s ease;
}

.chat-list.visible {
  transform: translateX(0);
}

.chat-list-header {
  background: #007bff;
  color: white;
  padding: 15px;
  font-weight: bold;
  position: relative;
}

.chat-users {
  flex: 1;
  overflow-y: auto;
}

.chat-user {
  display: flex;
  align-items: center;
  padding: 12px 15px;
  border-bottom: 1px solid #ddd;