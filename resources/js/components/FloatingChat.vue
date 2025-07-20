<template>
  <div class="fixed bottom-6 right-6 z-50 font-sans">
    <!-- Floating Chat Window -->
    <div v-if="open" class="bg-white w-80 h-96 rounded-lg shadow-lg border border-gray-300 flex flex-col overflow-hidden">
      <!-- Header -->
      <div class="bg-[#0074cc] text-white px-4 py-3 flex justify-between items-center">
        <span class="truncate font-semibold text-sm">
          Chat with {{ recipientName || 'User' }}
        </span>
        <button @click="open = false" class="hover:text-red-200 text-xl leading-none">
          &times;
        </button>
      </div>

      <!-- Messages -->
      <div class="flex-1 overflow-y-auto px-3 py-2 space-y-2 bg-gray-50">
        <div v-for="msg in messages" :key="msg.id" :class="msg.sender_id === userId ? 'text-right' : 'text-left'">
          <div
            :class="msg.sender_id === userId ? 'bg-[#0074cc] text-white' : 'bg-gray-200 text-gray-800'"
            class="inline-block rounded-lg px-3 py-2 text-sm max-w-[75%] break-words"
          >
            {{ msg.message }}
          </div>
        </div>
      </div>

      <!-- Input Area -->
      <form @submit.prevent="sendMessage" class="p-3 border-t flex gap-2 bg-white">
        <input
          v-model="message"
          type="text"
          placeholder="Type a message..."
          class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-[#0074cc] focus:border-[#0074cc] outline-none"
        />
        <button type="submit" class="bg-[#0074cc] text-white px-3 py-2 rounded hover:bg-[#005fa3] text-sm">
          Send
        </button>
      </form>
    </div>

    <!-- Floating Button -->
    <button
      v-else
      @click="open = true"
      class="bg-[#0074cc] p-3 rounded-full shadow-md hover:bg-[#005fa3] transition duration-200"
    >
      <img :src="chatIcon" alt="Chat" class="h-6 w-6" />
    </button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import chatIcon from '../assets/chat-icon.png' // ✅ Proper Vite import

const open = ref(false)
const message = ref('')
const messages = ref([])
const recipientName = ref('')

const userId = window.userId
const receiverId = window.recipientId

const fetchMessages = async () => {
  if (!receiverId) return

  try {
    const res = await fetch(`/chat/messages/${receiverId}`)
    const data = await res.json()
    messages.value = data
  } catch (error) {
    console.error('Fetch error:', error)
  }
}

const fetchRecipientName = async () => {
  if (!receiverId) return

  try {
    const res = await fetch(`/chat/recipient-name/${receiverId}`)
    const data = await res.json()
    recipientName.value = data.name
  } catch (error) {
    console.error('Recipient name fetch error:', error)
  }
}

const sendMessage = async () => {
  if (!message.value || !receiverId) return

  try {
    await fetch('/chat/send', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
        message: message.value,
        receiver_id: receiverId
      })
    })

    message.value = ''
    fetchMessages()
  } catch (error) {
    console.error('Send error:', error)
  }
}

onMounted(() => {
  fetchMessages()
  fetchRecipientName()
  setInterval(fetchMessages, 5000)
})
</script>

<style scoped>
.flex-1::-webkit-scrollbar {
  width: 6px;
}
.flex-1::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 4px;
}
</style>
