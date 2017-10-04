@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12 btn-h1-margin">
    <div class="jumbotron">
        <h1 class="display-3">Welcome to my blog</h1>
        <p class="lead">Thank you for visiting the website</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
        </p>
    </div>
            @component('components.who')
            @endcomponent
        </div>
        </div>

    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div> <h3>{{$post ->title}}</h3></div>
            <p>{{substr($post ->body,0,100)}}{{strlen($post ->body) > 100 ? "..." : ""}}</p>
            <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                <hr>
                @endforeach

        </div>
        <div class="col-md-4 lead"><h3>Side bar</h3> </div>
    </div>

    </div> <!-- end container-->
@endsection




