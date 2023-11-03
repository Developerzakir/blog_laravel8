@extends('layouts.master')

@section('title', 'View Users')

@section('content')

<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header">
            <h4>
                View Users 
            </h4>
        </div>

        <div class="card-body">

            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <table id="myTable" class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                               
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_as == '1'? 'Admin':'User'}}</td>
                    <td>
                        <a href="{{url('admin/users/'.$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            
        </div>
    </div>
</div>

@endsection