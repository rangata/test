@extends('layouts.app')

@section('content')
<div class="container">
    Редакция на {{ $patient->fullName() }}
    {!! Form::model($patient, ['route' => ['patients.update', $patient]]) !!}
    {!! method_field('PATCH') !!}
    <div class="container">
        <div class="row"></div>
        {!! Form::open(['url' => 'patients']) !!}

        <div class="form-group">
            {{ Form::label('name','Име') }}
            {{ Form::text('name',old('name'), ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('middlename', 'Презиме') }} <br>
            {{ Form::text('middlename', old('middlename') , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('lastname', 'lastname') }}
            {{ Form::text('lastname',old('lastname') , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('birthday', 'birthday') }}
            {{ Form::date('birthday',old('birthday') , ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'email') }}
            {{ Form::text('email',old('email') , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'phone') }}
            {{ Form::text('phone', old('phone') , ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('mobile', 'mobile') }}
            {{ Form::text('mobile', old('mobile'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::submit() !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection