@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                @auth
                    <h1 class="display-4">Hello {{ Auth::user()->name }}!</h1>
                @else
                    <h1 class="display-4">Hello Guest!</h1>
                @endauth

                <p class="lead">This is test1.</p>

            </div>
        </div>

    </div>
@endsection
