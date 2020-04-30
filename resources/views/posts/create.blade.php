@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}<br/>
            @endforeach
        </div>
    @endif

    {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}
    <div class="form-group">
    {!! Form::label('title', 'عنوان:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'محتوا:') !!}
         {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file', 'بار گزاری تصویر:') !!}
        {!! Form::file('file', ['class= form-control']) !!}
    </div>


        <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
{{--    <form action="/posts" method="post">--}}
{{--        @csrf--}}
{{--        <div class="from-group">--}}
{{--        <input type="text" name="title" class="form-control" placeholder="عنوان مطلب ">--}}
{{--            <br>--}}
{{--        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>--}}
{{--            <br>--}}
{{--        <button type="submit" name="submit" class="btn btn-primary">save</button>--}}
{{--        </div>--}}
{{--    </form>--}}
    @endsection


