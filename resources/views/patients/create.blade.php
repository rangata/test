@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"></div>
    {!! Form::open(['url' => 'patients']) !!}

    <div class="form-group">
        {{ Form::label('name','Име') }}
        {{ Form::text('name', '' , ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('middlename', 'Презиме') }} <br>
        {{ Form::text('middlename', '' , ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('lastname', 'lastname') }}
        {{ Form::text('lastname', '' , ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('birthday', 'birthday') }}
        {{ Form::date('birthday', '' , ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'email') }}
        {{ Form::text('email', '' , ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'phone') }}
        {{ Form::text('phone', '' , ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('mobile', 'mobile') }}
        {{ Form::text('mobile', '' , ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {!! Form::submit() !!}
    </div>

    {!! Form::close() !!}
</div>
<script>
    $(document).ready(function () {

    });
</script>
@endsection