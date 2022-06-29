@extends('layouts.admin')

@section('content')

<div class="container">
<form method="post" action="{{route('admin.posts.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label" placeholder="Title">Titolo</label>
      <input type="text" name="title" placeholderclass="form-control" id="title" value="{{$post->title}}" >
      <div></div>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" id="content" name="content"cols="30" rows="10">{{$post->content}}</textarea>
    </div>

    <div class="form-group">
      <img src="{{asset("storage/{$post->image}")}}" class="img-responsive"alt="">
      <label for="image">Aggiungi Immagine</label>
      <input type="file" name="image" id="image">
      @error('image')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" name="published" class="form-check-input" id="published" {{old('published') ? 'checked': ''}}>
      <label class="form-check-label" for="published">Pubblicato</label>
    </div>
    <div class="mb-3">
      <label for="category_id">Category</label>
      <select name="category_id" class="form-control" value="{{$post->category_id}}" id="category_id">
        <option value="">Select Category</option>
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
  </script>
  <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
  </script>

@endsection

