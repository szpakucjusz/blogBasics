@extends('layout')

@section('content')
    <div class="container">
    <ul>
        <li>
            <div class="container">
                @foreach ($posts as $post)
                    {{ $post->name }}
                @endforeach
            </div>
            {{ $posts->links() }}
        </li>
    </ul>
</div>
@endsection
