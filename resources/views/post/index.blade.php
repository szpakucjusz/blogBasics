@extends('layout')

@section('metaCsrf')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="container">
        @include('post._partials.list')
    </div>
@endsection
