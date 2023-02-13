@extends ('layout')

@section('title',"Create new post")
@section('content')
<div class="post-item">
    <div class="post-content">
      <h2>Update plat </h2>
      <form method="POST" enctype="multipart/form-data" action="{{route('plats.update',[$plat])}}">
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">
            <img src="{{asset('/storage/'.$plat->image)}}" style="width: 94%; height: 200px ;" alt="" srcset="">
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
            <input type="text" class="form-control @error('title') error-border @enderror" id="title" value="{{ old('title', $plat->title) }}" name="title" placeholder="Simple Title for your plat ..">
            @error('title')
            <div class="error">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="desc" class="col-form-label">Description:</label>
            <input type="text" class="form-control @error('description') error-border @enderror" id="description" value="{{ old('description',$plat->description) }}" name="description" placeholder="Simple description about your plat ..">
            @error('desc')
            <div class="error">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        
        <button type="submit">Update</button>
        
        </form>
    </div>
</div>

    
@endsection