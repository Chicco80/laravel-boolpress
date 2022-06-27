@extends('layouts.admin')

@section('content')


<form method="post" action="{{route('admin.tags.update', $tag->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label" placeholder="name">Modifica Categoria</label>
      <input type="text" name="name" placeholderclass="form-control" id="name" value="{{ old('name', $tag->name)}}" >
      
    </div>
    {{-- <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" id="content" name="content"cols="30" rows="10">{{$category->content}}</textarea>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" name="published" class="form-check-input" id="published" {{old('published') ? 'checked': ''}}>
      <label class="form-check-label" for="published">Pubblicato</label>
    </div>
    <div class="mb-3">
      <label for="category_id">Category</label>
      <select name="category_id" class="form-control" value="{{$category->category_id}}" id="category_id">
        <option value="">Select Category</option>
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
      </select>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

