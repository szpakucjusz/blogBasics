@extends('layouts.app')

@section('content')
    <div class="container">
    <ul>
        <li>
            <div class="container">
                @foreach ($users as $user)
                    {{ $user->name }} | {{ $user->email }}
                @endforeach
            </div>
            {{ $users->links() }}
        </li>
    </ul>
</div>
@endsection
