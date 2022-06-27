@extends('layouts.admin')

@section('content')
   <h1>{{$category->name}}</h1>
@if($category->posts)
   
   <ul>
      @foreach($category->posts as $post)
      <li>{{$post->name}}</li>
      @endForeach
   </ul>

@endif
  

@endsection