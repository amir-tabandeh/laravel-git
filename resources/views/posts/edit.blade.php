@extends('layouts.app')
@section('content')

@can('update', $post)

    {!! Form::model($post,['method'=>'PATCH', 'action'=>['PostsController@update',$post->id]]) !!}
    <div class="form-group">
        {!! Form::label('title', 'عنوان:') !!}
        {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'محتوا:') !!}
        {!! Form::textarea('description', $post->content, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('update', ['class' => 'form-control btn btn-warning']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($post,['method'=>'DELETE', 'action'=>['PostsController@destroy',$post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('delete', ['class' => 'form-control btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@endcan
    {{--    <form action="/posts/{{$post->id}}" method="post">--}}
{{--        @csrf--}}
{{--        <input type="hidden" name="_method" value="DELETE">--}}

{{--        <button type="submit" name="submit">delete</button>--}}

{{--    </form>--}}
@endsection

@section('footer')
@endsection
