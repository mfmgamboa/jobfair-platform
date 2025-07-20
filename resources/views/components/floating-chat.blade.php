<div id="floating-chat" class="fixed bottom-6 right-6 z-50">
    <button
        id="toggle-chat"
        class="bg-[#0074cc] hover:bg-[#005fa3] text-white p-3 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0074cc]"
        aria-label="Open chat"
    >
        <img src="{{ asset('images/chat-icon.png') }}" alt="Chat" class="h-6 w-6">
    </button>

    <div
        id="chat-box"
        class="hidden mt-2 w-80 h-96 bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden flex flex-col"
    >
        <div class="bg-[#004080] text-white px-4 py-2 rounded-t-2xl font-semibold flex justify-between items-center">
            <span>Live Chat</span>
            <button id="close-chat" class="text-white hover:text-gray-200" aria-label="Close chat">&times;</button>
        </div>
        <div class="flex-1 p-4 overflow-y-auto" id="chat-messages">
            <p class="text-gray-500 text-sm">Start chatting with participants...</p>
        </div>
        <div class="p-3 border-t border-gray-200">
            <input
                type="text"
                placeholder="Type your message..."
                class="w-full border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#0074cc]"
                id="chat-input"
            />
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('toggle-chat').addEventListener('click', () => {
        document.getElementById('chat-box').classList.toggle('hidden');
    });

    document.getElementById('close-chat').addEventListener('click', () => {
        document.getElementById('chat-box').classList.add('hidden');
    });
</script>
@endpush
