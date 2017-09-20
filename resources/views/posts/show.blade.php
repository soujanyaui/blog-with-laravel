@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <h1>{{$post ->title }}</h1>
                <h4 class="lead">{{$post->body}}</h4>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <label>Url:</label>
                        <p> <a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></p>
                    </dl>
                    <dl class="dl-horizontal">
                        <label>Created At :</label>
                        <p>{{date('M,j,Y h:ia',strtotime($post ->created_at)) }}</p>
                    </dl>
                    <dl class="dl-horizontal">
                        <label>Last Updated At :</label>
                        <p>{{date('M,j,Y, h:ia',strtotime($post ->updated_at)) }}</p>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {{Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block'))}}
                        </div>
                        <div class="col-md-6">
                            {!! Form:: open(['route' => ['posts.destroy',$post->id],'method'=>'DELETE'])!!}
                            {!! Form ::Submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                            {!!Form::close()!!}
                            {{--{{Html::linkRoute('posts.destroy','Delete',array($post->id),array('class'=>'btn btn-danger btn-block'))}}--}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{Html::linkRoute('posts.index','See All Posts',[],['class'=>'btn btn-primary btn-block btn-h1-margin'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
