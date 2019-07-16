@extends('layouts.master')
 
@section('content')
 
<div class="well">
 
    {!! Form::open(['url' => '/', 'class' => 'form-horizontal']) !!}
 
    <fieldset>
 
        <legend>Disaster Recovery Product/Services</legend>
 
        <!-- First Name -->
        <div class="form-group">
            {!! Form::label('first_name', 'First name:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Please insert your first name']) !!}
            </div>
        </div>

        <!-- Surname -->
        <div class="form-group">
            {!! Form::label('surname', 'Surname:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Please insert your surname']) !!}
            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            {!! Form::label('email', 'Email address:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Please insert your email adderess']) !!}
            </div>
        </div>
 
        <!-- Text Area -->
        <div class="form-group">
            {!! Form::label('details', 'What disaster recovery services or products are you interested in?', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::textarea('details', null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
        </div>
 
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
            </div>
        </div>
 
    </fieldset>
 
    {!! Form::close()  !!}
 
</div>