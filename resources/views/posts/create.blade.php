@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3">Create New Post</h1>
                    <p class="lead">Thank you for visiting the website</p>
                </div>

                {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
                {!! csrf_field() !!}
                {{--{!! Form::open(array(['route' => 'posts.store'])) !!}--}}
                <div class="form-group">
                {{Form::label('title','Title:',array('class'=>'margin-top-10'))}}
                {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
                </div>
                <div class="form-group">
                {{Form::label('slug','Slug:',array('class'=>'margin-top-10'))}}
                {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}
                </div>
                <div class="form-group">
                {{Form::label('body','Post Body:',array('class'=>'margin-top-10'))}}
                {{Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}
                </div>
                {{Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block margin-top-10'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div> <!-- end container-->



@endsection
