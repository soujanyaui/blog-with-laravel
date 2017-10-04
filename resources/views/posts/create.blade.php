@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3">Create New Post</h1>
                    <p class="lead">Thank you for visiting the website</p>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                {{----}}
                {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
                {!! csrf_field() !!}
                <div class="form-group"  {{ $errors->has('title') ? 'has-error' : '' }}>
                {{Form::label('title','Title:',array('class'=>'margin-top-10'))}}
                {{Form::text('title',null,array('class'=>'form-control','maxlength'=>'255'))}}
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
                <div class="form-group"  {{ $errors->has('slug') ? 'has-error' : '' }}>
                {{Form::label('slug','Slug:',array('class'=>'margin-top-10'))}}
                {{Form::text('slug',null,array('class'=>'form-control','minlength'=>'5','maxlength'=>'255'))}}
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                </div>
                <div class="form-group"  {{ $errors->has('body') ? 'has-error' : '' }}>
                {{Form::label('body','Post Body:',array('class'=>'margin-top-10'))}}
                {{Form::textarea('body',null,array('class'=>'form-control'))}}
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                </div>
                {{Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block margin-top-10'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div> <!-- end container-->



@endsection
