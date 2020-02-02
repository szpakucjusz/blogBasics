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
        <td>role</td>
        <td>change</td>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                <form method="POST" action="users/edit-role">
                    @method('PUT'){{ csrf_field() }}
                    <input name="id" type="hidden" value="{{ $user->id }}" />
                    <select name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role }}" @if($role === $user->role)  selected @endif>{{ $role }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn-submit-edit-role">Update</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    {{ $users->links() }}
</div>
@endsection
