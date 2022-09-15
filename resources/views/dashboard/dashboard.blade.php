@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="card card-success">
        <div class="card-body">
          <div class="row">
            @foreach ($albums as $album)
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{asset($album->avatar)}}" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <a href="{{route('user.albums',$album->id)}}" class="text-white">{{$album->name}}</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
</div>
@endsection
