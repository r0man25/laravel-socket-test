<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

Broadcast::channel('echo-room.{id}', function (\App\User $user, $id) {
    return $user->rooms->contains($id);
});

Broadcast::channel('echo-presence-room.{id}', function (\App\User $user, $id) {
    if ($user->rooms->contains($id)) {
        return $user;
    }

    return false;
});
