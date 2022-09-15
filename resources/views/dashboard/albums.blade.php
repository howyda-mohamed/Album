@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="card card-success">
        <div class="card-body">
          <div class="row">
            @foreach ($images as $image)
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{asset($image->name)}}" alt="Dist Photo 1">
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
</div>
@endsection
