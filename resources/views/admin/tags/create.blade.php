@extends('layouts.admin')

@section('content')
<form method="post" action="{{route('admin.tags.store')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label" placeholder="Name" value="{{old('name')}}">Name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" required>
      @error('name')
            <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    {{-- <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"cols="30" rows="10">{{old('content')}}</textarea>
      @error('content')
                  <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" name="published" class="form-check-input" id="published" {{old('published') ? 'checked': ''}}>
      <label class="form-check-label" for="published">Pubblicato</label>
    </div>
    <div class="mb-3">
      <label for="category_id">Category</label>
      <select name="category_id" class="form-control" id="category_id">
        <option value="">Select Category</option>
        @foreach ($tags as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>

        <div class="mb-3">
          <div class="form-group">
          <h5>Tags</h5>
          @foreach($tags as $tag)
          <div class="form-check-inline">
            <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
            <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input"{{in_array($tag->id, old("tags" , [])) ? 'checked': ''}} id="{{$tag->slug}}">
          @endforeach
          </div>
        </div>
      </div>
      

    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection