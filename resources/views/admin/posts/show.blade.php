@extends('layouts.admin')


{{-- @section('content')
   <h1>{{$post->title}}</h1>
   <img src="{{ asset('storage/' . $post->image) }}" class="" alt="{{ $post->title }}">
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
@endsection --}}
@section('content')
<div class="container">
   <div class="row">
      <div class="col">
         <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            @if($post->category)
                  <h2>{{$post->category->name}}</h2>
            @endif
            @foreach($post->tags as $item)
            <h3>{{$item->name}}</h3>
            @endForeach
            
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection