<?php
use App\Model\User;
?>
<table class="db">
    <thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>created at</td>
        <td>updated at</td>
        @auth
            @if(User::hasEditorRole(Auth::user()->role))
        <td>edit post</td>
        <td>delete post</td>
            @endif
        @endauth
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td class="id">{{ $post->id }}</td>
            <td>{{ $post->name }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            @auth
                @if(User::hasEditorRole(Auth::user()->role))
                <td><a href="post/{{ $post->id }}/edit">Edit</a></td>
                <td>
                    <form method="POST" action="post/{{ $post->id }}">
                        @method('POST'){{ csrf_field() }}
                        <button type="submit">Delete</button>
                    </form>
                </td>
                @endif
            @endauth
        </tr>
    @endforeach
    </tbody>
</table>
{{ $posts->links() }}
