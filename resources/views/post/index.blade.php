@extends('layout')

@section('metaCsrf')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="container">
        <table class="db">
            <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>created at</td>
                    <td>updated at</td>
                    <td>edit post</td>
                    <td>delete post</td>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="id">{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td><a href="post/{{ $post->id }}/edit">Edit</a></td>
                    <td>
                        <form method="POST" action="post/{{ $post->id }}">
                            @method('DELETE'){{ csrf_field() }}
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
