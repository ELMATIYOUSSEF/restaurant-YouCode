@extends ('layout')
@section('title',$plat->title)
@section('content')
      
        <div class="post-item">
            <div class="post-content">
                <h2><span><strong>{{$plat->id}}</strong></span> {{$plat->title}}</h2>
                <p>
                    {{$plat->description}}
                </p>
                <a href="{{ route('plats.edit',[$plat ,])}}">Edit plat</a>
                <form method="POST" action="{{route('plats.destroy',[$plat])}}">
                    @csrf 
                    @method('DELETE')
                    <button class="delete" type="submit">Delete plat</button>
                </form>
            </div>
        </div>
@endsection