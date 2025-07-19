<template>
  <div>
    <h2>Chat</h2>
    <ul>
      <li v-for="message in messages" :key="message.id">
        <strong>{{ message.sender_id }}:</strong> {{ message.body }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ['currentUserId'],
  data() {
    return {
      messages: [],
    };
  },
  mounted() {
    console.log('Listening to chat.' + this.currentUserId);
    Echo.channel('chat.' + this.currentUserId)
      .listen('.message.sent', (e) => {
        console.log('Message received:', e);
        this.messages.push({
          id: e.id,
          body: e.body,
          sender_id: e.sender_id,
          receiver_id: e.receiver_id,
          created_at: e.created_at
        });
      });
  }
};
</script>
