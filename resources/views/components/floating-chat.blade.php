@if(Auth::check())
    <div id="chat-app" class="fixed bottom-6 right-6 z-50">
        <floating-chat
            :user-id="{{ auth()->id() }}"
            :recipient-id="{{ session('chat_recipient_id', 1) }}">
        </floating-chat>
    </div>
@endif
