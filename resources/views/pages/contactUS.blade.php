@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Contact US Form</h1>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        {{--{!! Form::open(['route'=>'contactus.store']) !!}--}}
        {{--<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">--}}

        {{--{!! Form::text('ccnum', old('ccnum'), ['class'=>'form-control', 'placeholder'=>'enter ccnum']) !!}--}}
        {{--<span class="text-danger">{{ $errors->first('ccnum') }}</span>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<button class="btn btn-success">Contact US!</button>--}}
        {{--</div>--}}


        {{--<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">--}}
            {{--{!! Form::label('Name:') !!}--}}
            {{--{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}--}}
            {{--<span class="text-danger">{{ $errors->first('name') }}</span>--}}
        {{--</div>--}}

        {{--<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">--}}
            {{--{!! Form::label('Email:') !!}--}}
            {{--{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}--}}
            {{--<span class="text-danger">{{ $errors->first('email') }}</span>--}}
        {{--</div>--}}

        {{--<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">--}}
            {{--{!! Form::label('Message:') !!}--}}
            {{--{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}--}}
            {{--<span class="text-danger">{{ $errors->first('message') }}</span>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<button class="btn btn-success">Contact US!</button>--}}
        {{--</div>--}}

        {{--{!! Form::close() !!}--}}
        {{ Form::open(['route'=>('contactus.store'), 'class' => 'form-horizontal']) }}
        {!! csrf_field() !!}
        <div class=" {{ $errors->has('ccnum') ? 'has-error' : '' }}">
            {{ Form::text('ccnum',old('ccnum'),['class' => 'form-control guest-pass-form margin-top-10 slider1-pad','id'=>'cardnumber','placeholder' => 'Card Number']) }}
            <span class="text-danger">{{ $errors->first('ccnum') }}</span>
        </div>
        <div class=" {{ $errors->has('MM') ? 'has-error' : '' }}">
            {{Form::select('MM', ['01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12'],null,['class' => ' margin-top-10 slider1-pad inp-width month pull-left','id'=>'month','placeholder' => 'MM'])}}
            <span class="text-danger">{{ $errors->first('MM') }}</span>
        </div>
        <div class=" {{ $errors->has('MM') ? 'has-error' : '' }}">
            {{Form::select('YY', ['18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28','29' => '29','30' => '30'], null, ['class' => ' margin-top-10 slider1-pad inp-width month pull-left','id'=>'Year','placeholder' => 'YY'])}}
            <span class="text-danger">{{ $errors->first('YY') }}</span>
        </div>
        {{ Form::number('cccvv',old('cccvv'),['class' => ' margin-top-10 slider1-pad inp-width cvc pull-left','id'=>'cvc','placeholder' => 'CVV']) }}
        <div class=" {{ $errors->has('firstname') ? 'has-error' : '' }}">
            {{ Form::text('firstname', '', ['class' => 'form-control guest-pass-form margin-top-10', 'placeholder' => 'Cardholder First Name']) }}
            <span class="text-danger">{{ $errors->first('firstname') }}</span>
        </div>
        <div class=" {{ $errors->has('lastname') ? 'has-error' : '' }}">
            {{ Form::text('lastname', '', ['class' => 'form-control guest-pass-form margin-top-10', 'placeholder' => 'Cardholder Last Name']) }}
            <span class="text-danger">{{ $errors->first('lastname') }}</span>
        </div>

        {{ Form::number('phone',old('phone'),['class' => 'form-control guest-pass-form margin-top-10 slider1-pad','id'=>'phone','placeholder' => 'Cardholder Phone  (555)5555555']) }}
        {{ Form::text('addr1',old('addr1'),['class' => 'form-control guest-pass-form margin-top-10 slider1-pad','id'=>'address1','placeholder' => 'Billing Address']) }}
        {{ Form::text('city',old('city'),['class' => 'form-control guest-pass-form margin-top-10 slider1-pad','id'=>'city','placeholder' => 'Billing City']) }}
        {{ Form::text('state',old('state'),['class' => ' margin-top-10 slider1-pad inp-width pull-left','id'=>'state','placeholder' => 'Billing State']) }}
        {{ Form::number('postalcode',old('postalcode'),['class' => ' margin-top-10 slider1-pad inp-width zip-code pull-left','id'=>'cvc','placeholder' => 'Billing ZipCode']) }}
        {{--{!! Form::select('country', $countries, 'US',['class' => 'form-control guest-pass-form margin-top-10 slider1-pad','id'=>'country','placeholder' => 'Billing Country'']) !!}--}}
        <br>
        {{--<h4 class="align-center margin-top-10">Your Email Address: {{ $ibex_account->contact->EMail }}</h4> <br>--}}
        <button type="submit" class="btn btn-primary btn-yellow btn-block align-center no-padding">Submit Information
        </button>
        {!! Form::close() !!}

    </div>

@endsection

