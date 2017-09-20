@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Blog</h1>
            </div>
        </div>
        @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{$post ->title}}</h2>
                <h5>Published: {{date('M j,Y',strtotime($post->created_at))}}</h5>
                <p>{{substr($post->body,0,200)}}{{strlen($post->body)> 200 ? '....' : " "}}</p>
                <a href="{{ route('blog.single',$post->id)}}" class="btn btn-primary">ReadMore</a>
                <hr>
            </div>

        </div>
        @endforeach

        <div class="text-center">
            {!! $posts->links(); !!}
        </div>
@endsection
