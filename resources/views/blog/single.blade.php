@extends('layouts.app')
{{--@section('title','|{{$post->title}}')--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <h1>{{$post->title}}</h1>
                 <p>{{$post->body}}</p>
                <hr>
                <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                {{--<p>Posted In :{{$post->product_id->name}}</p>--}}
            </div>
        </div>
    </div> <!-- end container-->
@endsection
