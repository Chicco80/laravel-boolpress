@extends('layouts.admin')


@section('content')
   <h1>{{$post->title}}</h1>
@if($post->category)
   <h2>{{$post->category->name}}</h2>
@endif
   <small>{{$post->created_at}}</small>
   <p>{{$post->content}}</p>
   <h5>Pubblicato:{{$post->published }}</h5>
<ul>
   @foreach($post->tags as $item)
   <li>{{$item->name}}</li>
   @endForeach
</ul>
@endsection