@extends('layout')

@section('content')
    @include('post._partials.menu')
    <div>
        <form method="POST" action="/post/{{ $post->id }}">
            @method('PUT')
            {{ csrf_field() }}
            @if ($errors->any('name'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="name">Post Name</label>
            <input type="text" name="name" value="{{ $post->name }}" />
            <p>Created at: {{ $post->created_at }}</p>
            <p>Updated at: {{ $post->created_at }}</p>
            <button type="submit">Update</button>
        </form>

    </div>
@endsection
