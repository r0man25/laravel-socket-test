<?php

namespace App\Http\Controllers;

use App\Events\EchoMessageEvent;
use App\Events\EchoPresenceMessageEvent;
use App\Events\EchoPrivateMessageEvent;
use App\Room;
use Illuminate\Http\Request;

/**
 * Class EchoServerController
 * @package App\Http\Controllers
 */
class EchoServerController extends Controller
{
    public function index()
    {
        return view('echo-server.chat');
    }

    public function sendMessage(Request $request)
    {
        event(new EchoMessageEvent($request->get('message')));
    }

    public function getRoom(Room $room)
    {
        return view('echo-server.room', ['room' => $room]);
    }

    public function sendPrivateMessage(Request $request)
    {
        event(new EchoPrivateMessageEvent($request->all()));
    }

    public function sendPrivateMessagePresence(Request $request)
    {
        event(new EchoPresenceMessageEvent($request->all()));
    }
}
