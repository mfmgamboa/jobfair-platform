<template>
  <div class="fixed bottom-4 right-4 z-50 bg-white rounded-xl shadow-lg w-96 border border-gray-300">
    <div class="flex items-center justify-between p-3 bg-[#004080] text-white rounded-t-xl">
      <h2 class="text-sm font-semibold">Messages</h2>
      <button @click="toggleChat" class="text-white">&times;</button>
    </div>
    <div v-if="showChat" class="flex flex-col h-80">
      <div class="flex-1 overflow-y-auto p-3 space-y-2">
        <div v-for="msg in messages" :key="msg.id" class="text-sm">
          <div :class="msg.sender_id === userId ? 'text-right text-blue-600' : 'text-left text-gray-700'">
            <span>{{ msg.content }}</span>
          </div>
        </div>
      </div>
      <form @submit.prevent="sendMessage" class="p-3 border-t flex gap-2">
        <input
          v-model="newMessage"
          type="text"
          placeholder="Type a message..."
          class="flex-1 border rounded-lg px-3 py-2 text-sm focus:outline-none"
        />
        <button class="bg-[#0074cc] hover:bg-[#005fa3] text-white text-sm px-4 py-2 rounded-lg">
          Send
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
const props = defineProps({ userId: Number, recipientId: Number })

const showChat = ref(true)
const newMessage = ref('')
const messages = ref([])

const fetchMessages = async () => {
  try {
    const res = await axios.get(`/chat/${props.recipientId}/messages`)
    messages.value = res.data
  } catch (e) {
    console.error(e)
  }
}

const sendMessage = async () => {
  if (!newMessage.value.trim()) return
  try {
    await axios.post(`/chat/${props.recipientId}/messages`, {
      message: newMessage.value
    })
    newMessage.value = ''
    fetchMessages()
  } catch (e) {
    console.error(e)
  }
}

const toggleChat = () => {
  showChat.value = !showChat.value
}

onMounted(() => {
  fetchMessages()
  setInterval(fetchMessages, 3000) // Polling
})
</script>

<style scoped>
</style>
