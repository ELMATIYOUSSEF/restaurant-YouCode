@extends ('layout')

@section('title',"Create new post")
@section('content')
<div class="post-item">
    <div class="post-content">
      <h2>Create new post </h2>
      <form method="POST" enctype="multipart/form-data" action="{{route('plats.store')}}">
        @csrf 

        <div class="form-group">
            <label for="image" class="col-form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control @error('image') error-border @enderror">
            @error('image')
            <div class="error">
              {{ $message }}
            </div>
          @enderror
        </div>
  
        <div class="mb-3">
            <label for="title" class="col-form-label">Title:</label>
            <input type="text" class="form-control @error('title') error-border @enderror" id="title" value="{{ old('title') }}" name="title" placeholder="Simple Title for your plat ..">
            @error('title')
            <div class="error">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="desc" class="col-form-label">Description:</label>
            <input type="text" class="form-control @error('description') error-border @enderror" id="desc" value="{{ old('description') }}" name="description" placeholder="Simple description about your plat ..">
            @error('description')
            <div class="error">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        
        <button type="submit">Submit</button>
        
        </form>
    </div>
</div>

    
@endsection