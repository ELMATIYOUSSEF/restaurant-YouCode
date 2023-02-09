@extends('layout')

@section('title', 'Home')

@section('content')
<div class="post-item">
  <div class="post-content">
    
        @forelse($plats as $plat)
      
              <img src="{{ asset('/storage/'.$plat->image) }}" style="width: 94%; height: 200px ;" alt="image plat">
              
              <h2><span><strong>{{$plat->id}} ) -</strong></span> {{$plat->title}}</h2>
              <p>
                  {{$plat->description}}
              </p>
              <a href="{{ route('plats.edit',[$plat ,])}}">Edit plat</a>
              <form method="POST" action="{{route('plats.destroy',[$plat])}}">
                  @csrf 
                  @method('DELETE')
                  <button class="delete" type="submit">Delete plat</button>
              </form>

        @empty 
        <h2 style="color :red">Ther are no Posts yet .</h2>
      @endforelse
         
      </div>
  </div>
  </div>
</div>
@endsection
