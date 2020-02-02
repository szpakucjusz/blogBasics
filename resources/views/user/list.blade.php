@extends('layouts.app')

@section('content')
<div class="container">
<table class="db">
    <thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>created at</td>
        <td>updated at</td>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}
                <form method="POST" action="post/{{ $post->id }}">
                    @method('DELETE'){{ csrf_field() }}
                    <button type="submit">Delete</button>
                </form>
            </td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
