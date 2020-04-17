<?php

namespace App\Http\Controllers;

use App\Events\EchoMessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class EchoServerController
 * @package App\Http\Controllers
 */
class EchoServerController extends Controller
{
    public function index()
    {
        Auth::user();
        return view('echo-server.chat');
    }

    public function sendMessage(Request $request)
    {
        event(new EchoMessageEvent($request->get('message')));
    }
}
