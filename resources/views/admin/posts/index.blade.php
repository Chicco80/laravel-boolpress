

@extends('layouts.admin')

@section('content')
<div class="container">

  <div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Conferma Eliminazione</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Sei Sicuro  @{{itemid}} ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @@click="submitForm()">cancella</button>
        </div>
      </div>
    </div>
  </div>


<a href="{{route('admin.posts.create')}}" class="btn btn-success mb-2">Crea Nuovo Post</a>
<table class="table">
    <thead>
      <tr >
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Creation date</th>
        <th scope="col">Modifica</th>
        <th scope="col">Cancella</th>

      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        
        <td><a href="{{route('admin.posts.show',$post->id)}}">{{$post->id}}</a></td>
        <td><a href="{{route('admin.posts.show',$post->id)}}">{{$post->title}}</a></td>
        <td>{{$post->created_at}}</td>
        <td><a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary">Modifica</a></td>
        <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <td> <button type="submit" @@click="openModal($event,{{$post->id}})" class="btn btn-danger">Cancella</button></td>
        </form>
      </tr>
      @endforeach
      
    </tbody>
    
  </table>
  {{$posts->links()}}
</div>
  
@endsection
