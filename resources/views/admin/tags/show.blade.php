@extends('layouts.admin')

@section('content')
   <h1>{{$post->name}}</h1>
@if($category->posts)
   
   <ul>
      @foreach($category->posts as $post)
      <li>{{$post->title}}</li>
      @endForeach
   </ul>

@endif
  

@endsection