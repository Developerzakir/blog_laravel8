@extends('layouts.master')

@section('title', 'Posts')

@section('content')

<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header">
            <h4>
                View Post <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add post</a>
            </h4>
        </div>

        <div class="card-body">

            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table id="myTable" class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Post Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    @if ($item->category)
                        <td>{{ $item->category->name }}</td>
                    @endif                 
                    <td>{{$item->name}}</td>
                    <td>{{$item->status == '1'? 'Hidden':'Shown'}}</td>
                    <td>
                        <a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            
        </div>
    </div>
</div>

@endsection