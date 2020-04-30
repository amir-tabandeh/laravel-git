@extends('layouts.app')
@section('content')
 <ul>
     @foreach($posts as $post)
         <div class="image-container">
             <img src="/images/{{$post->path}}" class="image-responsive">
         </div>
         <li>
             <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
             <span> {{$post->user->name}} </span>
         </li>
     @endforeach
 </ul>
@stop
