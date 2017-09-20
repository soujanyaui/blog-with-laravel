@extends('layouts.app')

@section('content')
    <div class="container btn-h1-margin">
        <div class="row">
            {!!Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT'])!!}
            <div class="col-md-8 ">
           {{Form::label('title','Title:')}}
           {{Form::text('title',null,['class'=>'form-control input-lg'])}}<br>
           {{Form::label('slug','Slug:')}}
           {{Form::text('slug',null,['class'=>'form-control input-lg'])}}<br>
           {{Form::label('title','Body:')}}
           {{Form::textarea('body',null,['class'=>'form-control input-lg'])}}
            </div>
            <div class="col-md-4 btn-h1-margin">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At :</dt>
                        <dd>{{date('M,j,Y h:ia',strtotime($post ->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last Updated At :</dt>
                        <dd>{{date('M,j,Y h:ia',strtotime($post ->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {{Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block'))}}
                        </div>
                        <div class="col-md-6">
                            {{Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
                            {{--{{Html::linkRoute('posts.update','Save Changes',array($post->id),array('class'=>'btn btn-success btn-block'))}}--}}
                        </div>
                    </div>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@stop
