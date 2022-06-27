

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


<a href="{{route('admin.tags.create')}}" class="btn btn-success mb-2">Crea Nuove Tag</a>
<table class="table">
    <thead>
      <tr >
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Creation date</th>
        <th scope="col">Modifica</th>
        <th scope="col">Cancella</th>

      </tr>
    </thead>
    <tbody>
      @foreach($tags as $tag)
      <tr>
        
        <td><a href="{{route('admin.tags.show',$tag->id)}}">{{$tag->id}}</a></td>
        <td><a href="{{route('admin.tags.show',$tag->id)}}">{{$tag->title}}</a></td>
        <td>{{$tag->created_at}}</td>
        <td><a href="{{route('admin.tags.edit',$tag->id)}}" class="btn btn-primary">Modifica</a></td>
        <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
        @csrf
        @method('DELETE')
        <td> <button type="submit" @@click="openModal($event,{{$tag->id}})" class="btn btn-danger">Cancella</button></td>
        </form>
      </tr>
      @endforeach
      
    </tbody>
    
  </table>
  {{$tags->links()}}
</div>
  
@endsection
