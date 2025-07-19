<template>
  <div class="flex h-[500px] border rounded-lg overflow-hidden">
    <!-- Contact List -->
    <div class="w-1/3 bg-gray-100 p-4 overflow-y-auto">
      <h2 class="text-lg font-semibold mb-2">Conversations</h2>
      <ul>
        <li v-for="contact in contacts" :key="contact.id"
            @click="selectContact(contact)"
            class="cursor-pointer p-2 hover:bg-blue-100"
            :class="{'bg-blue-200': selectedContact?.id === contact.id}">
          {{ contact.name }}
        </li>
      </ul>
    </div>

    <!-- Chat Area -->
    <div class="flex-1 flex flex-col">
      <div class="flex-1 p-4 overflow-y-auto">
        <div v-if="selectedContact">
          <div v-for="message in messages" :key="message.id" class="mb-2">
            <strong>{{ message.from_user_id === userId ? 'Me' : selectedContact.name }}:</strong>
            {{ message.message }}
          </div>
        </div>
        <div v-else class="text-gray-500">Select a contact to start chatting</div>
      </div>

      <form @submit.prevent="sendMessage" class="p-4 border-t">
        <input v-model="newMessage" type="text" placeholder="Type a message"
               class="w-full border rounded px-4 py-2" />
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'ChatApp',
  data() {
    return {
      contacts: [],
      messages: [],
      selectedContact: null,
      newMessage: '',
      userId: null,
    }
  },
  methods: {
    async fetchContacts() {
      const res = await axios.get('/chat/contacts')
      this.contacts = res.data
    },
    async selectContact(contact) {
      this.selectedContact = contact
      const res = await axios.get(`/chat/messages/${contact.id}`)
      this.messages = res.data
    },
    async sendMessage() {
      if (!this.newMessage.trim()) return
      const payload = {
        to: this.selectedContact.id,
        message: this.newMessage
      }
      const res = await axios.post('/chat/messages', payload)
      this.messages.push(res.data)
      this.newMessage = ''
    }
  },
  async mounted() {
    await this.fetchContacts()
    const res = await axios.get('/api/user') // New endpoint to get current user ID
    this.userId = res.data.id
  }
}
</script>
