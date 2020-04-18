@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="container">
            <h3>Private chat</h3>
            <div class="container">
                <echo-private-chat
                    :room="{{ $room }}"
                    :auth-user="{{ \Illuminate\Support\Facades\Auth::user() }}"
                >
                </echo-private-chat>
            </div>
        </div>
        <br>


        <div class="container">
            <h3>Presence chat</h3>
            <div class="container">
                <echo-presence-chat
                    :room="{{ $room }}"
                    :auth-user="{{ \Illuminate\Support\Facades\Auth::user() }}"
                >
                </echo-presence-chat>
            </div>
        </div>
    @endif
@endsection
