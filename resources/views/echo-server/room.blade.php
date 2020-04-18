@extends('layouts.app')

@section('content')
<div class="container">
    <echo-private-chat :room="{{ $room }}"></echo-private-chat>
</div>
@endsection
