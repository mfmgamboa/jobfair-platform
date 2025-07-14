<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you register broadcasting channels your app supports.
| This ensures only authorized users can listen to certain channels.
|
*/

/**
 * Private chat channel authorization
 * Only the intended recipient (receiverId) can listen to their private chat channel.
 */
Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});
