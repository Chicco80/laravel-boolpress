@extends('layouts.admin')

@section('content')
<div class="container">
<form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label" placeholder="Title" value="{{old('title')}}">Titolo</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" required>
      @error('title')
            <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"cols="30" rows="10">{{old('content')}}</textarea>
      @error('content')
                  <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <img src="http://via.placeholder.com/300x200" class="img-responsive"alt="">
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
      <select name="category_id" class="form-control" id="category_id">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
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