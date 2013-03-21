@extends('template')

@section('content')
{{Form::model($doc)}}
{{Form::text('tracking_no')}}
{{Form::text('title')}}
{{Form::submit('Submit', ['class'=>"btn btn-primary"])}}
{{Form::close()}}
@stop