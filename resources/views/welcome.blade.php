@extends('layouts.app')

@section('content')
<div class="container">
    @include('post._partials.list')
    {{ $posts->links() }}
</div>
@endsection
