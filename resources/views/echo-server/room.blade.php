@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="container">
            <echo-private-chat
                :room="{{ $room }}"
                :auth-user="{{ \Illuminate\Support\Facades\Auth::user() }}"
            >
            </echo-private-chat>
        </div>
    @endif
@endsection
