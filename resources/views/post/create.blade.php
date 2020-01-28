@extends('layout')

@section('content')
    @include('post._partials.menu')
    <div class="container">
        <form method="post" action="/post" enctype="multipart/form-data">
            @method('POST')
            {{ csrf_field() }}
            <div>
                @if ($errors->any('name'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <label for="name">Post Name</label>
                    <input type="text" name="name" />
                </div>
                <div>
                    <label for="photos[]">Upload picture</label>
                    <input multiple="multiple" name="photos[]" type="file">
                </div>
            </div>
            <div>
                <button type="submit">Add!</button>
            </div>
        </form>
    </div>
@endsection
