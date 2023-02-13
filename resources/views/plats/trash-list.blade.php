@extends('layout')

@section('title', 'Trash list')

@section('content')

<div class=" d-flex justify-content-center align-items-center pt-5">
<div class="card w-75 ">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th colspan="2"> action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($plats as $plat)
    <tr>
      <th scope="row">{{$plat->id}}</th>
      <td> <img src="{{ asset('/storage/'.$plat->image) }}" style="width:50px; height: 40px ; border-radius: 50%;" alt="image plat">      </td>
      <td> {{$plat->title}}</td>
      <td> {{$plat->description}}</td>
        @auth
        <td> <a href="{{ route('restore',[$plat->id ,])}}" class="btn btn-success">Restore </a></td>
        <td> 
            <div class="">
               
                <a href="javascript:void(0)"
                    onclick="if(confirm('Are You sure to delete this Plat?')){document.getElementById('plats{{$plat->id}}').submit();} else {return false}"
                    class="btn btn-danger">
                    <i class="fa fa-trash">Delete</i>
                </a>
                <form method="POST" action="{{route('plats.destroy',[$plat])}}" id="plat{{$plat->id}}">
            <form method="POST" id="plats{{$plat->id}}" action="{{route('deleteForce',[$plat->id,])}}">
                @csrf 
                @method('DELETE')
                {{-- <button class="delete btn btn-danger" onclick="deleteplat({{$plat->id}})" id="plat{{$plat->id}}" type="submit">Delete plat</button> --}}
            </form>
            </div>
          
        </td>  @endauth
    </tr>
    @empty 
<h2 style="color :red">Ther are no Posts yet .</h2>
</div>
</div>
@endforelse
  </tbody>
  
</table>
<div class="d-flex justify-content-center">
    {{ $plats->links() }}
  </div>

@endsection

