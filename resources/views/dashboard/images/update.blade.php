@extends('layouts.admin')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Images</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Main Category</li>
              <li class="breadcrumb-item"><a href="{{route('Get_Image')}}">Image</a></li>
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
              <h3 class="card-title">Update Main Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Image.update',$images->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <!-- select -->
                    <div class="form-group">
                      <label>Select Album</label>
                      <select name="album_id" class="form-control">
                        <option value="{{$images->album_id}}">{{$images->album->name}}</option>
                        @foreach ($albums as $album )
                        <option value="{{$album->id}}">{{$album->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('album_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <img src="{{asset($images->name)}}" width="100px" height="100px"/>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="name" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                    </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>
  </div>
@endsection
