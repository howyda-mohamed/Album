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
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline scroll-horizontal" role="grid" aria-describedby="example2_info">
                    <a href="{{route('Image.create')}}" class="btn btn-success">Add image</a>
              <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Album Title</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="2" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
              </thead>
              <tbody>
                @isset($images)
                @foreach ($images as $image)
                    <tr class="odd">
                        <td>{{$image->album->name}}</td>
                        <td><img  width="100" height="100" src="{{asset($image->name)}}"></td>
                        <td><a href="{{route('Image.edit',$image->id)}}" class="btn btn-block btn-info">Update</a></td>
                        <td><a href="{{route('Image.delete',$image->id)}}" class="btn btn-block btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                @endisset
              </tbody>
              </table>
              </div>
          </div>
    </section>
  </div>
@endsection
