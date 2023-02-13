@extends('layout')

@section('title', 'Home')

@section('content')

<div class=" d-flex justify-content-center align-items-center pt-5">
<div class="card w-75 ">
  @auth
  <div class="d-flex justify-content-end w-100 pt-3 px-3">
    <a href="{{ route('plats.TrashedPlat')}}" class="btn btn-warning">Trash</a>
  </div>
  @endauth
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col"> action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($plats as $plat)
    <tr>
      <th scope="row">{{$plat->id}}</th>
      <td> <img src="{{ asset('/storage/'.$plat->image) }}" style="width:50px; height: 40px ; border-radius: 50px;" alt="image plat">      </td>
      <td> {{$plat->title}}</td>
      <td> {{$plat->description}}</td>
      <td> @auth
        <div class="">
            <a href="javascript:void(0)" onclick="if(confirm('Are You sure to delete this Plat?')){document.getElementById('plat{{$plat->id}}').submit();} else {return false}" class="">
                  <lord-icon
                    src="https://cdn.lordicon.com/kfzfxczd.json"
                    trigger="hover"
                    colors="primary:#911710"
                    style="width:40px;height:40px">
                </lord-icon>
              </a>
              <a href="{{ route('plats.edit',[$plat ,])}}" class=""><lord-icon
                src="https://cdn.lordicon.com/hbigeisx.json"
                trigger="hover"
                colors="primary:#c79816"
                style="width:40px;height:40px">
            </lord-icon></a>
          <form method="POST" action="{{route('plats.destroy',[$plat])}}" id="plat{{$plat->id}}">
              @csrf 
              @method('DELETE')
              {{-- <button class="delete btn btn-danger" onclick="deleteplat({{$plat->id}})" id="plat{{$plat->id}}" type="submit">Delete plat</button> --}}
          </form>
        </div>
        @endauth</td>
    </tr>
    @empty 
<h2 style="color :red">Ther are no Posts yet .</h2>
@endforelse
  </tbody>
</table>
</div>
</div>
  <div class="d-flex justify-content-center">
    {!! $plats->links() !!}
</div>

@endsection

