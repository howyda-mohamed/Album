@extends('layouts.admin')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Albums</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Albums</li>
              <li class="breadcrumb-item"><a href="{{route('Get_Album')}}">Albums</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (Session::has('status'))
    <div class="alert alert-success">{{ Session::get('status') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Move Album</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Album.move',$albums->id)}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Select Album</label>
                    <select name="name" class="form-control">
                      <option value="0">{{$albums->name}}</option>
                      @foreach ($album as $alb )
                      <option value="{{$alb->id}}">{{$alb->name}}</option>
                      @endforeach
                    </select>
                  </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
