<?php
use App\Model\User;
?>
@auth
    @if(User::hasEditorRole(Auth::user()->role))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu Post</div>
                <ul>
                    <li>
                        <a href="/post">Posts list</a>
                            <a href="/post/create">Add Post</a>
                            @if(User::hasAdminRole(Auth::user()->role))
                            <a href="/users">Users</a>
                            @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    @endif
@endauth
