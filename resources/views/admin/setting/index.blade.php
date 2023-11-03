@extends('layouts.master')

@section('title', 'Setting')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Setting</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Setting</li>
    </ol>
    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>

            @endif 
            <div class="card">
                <div class="card-header">
                    <h3>Website Setting</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Website Name</label>
                            <input type="text" class="form-control" @if($setting) value="{{$setting->website_name}}" @endif name="website_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="">Website Logo</label>
                            <input type="file" class="form-control" name="website_logo" required>

                            @if($setting)
                            <img src="{{asset('uploads/settings/'.$setting->logo)}}" class="mt-2" width="70px" height="70px" alt="">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="">Website Favicon</label>
                            <input type="file" class="form-control" name="website_favicon" required>

                            @if($setting)
                            <img src="{{asset('uploads/settings/'.$setting->favicon)}}" class="mt-2" width="70px" height="70px" alt="">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                           <textarea name="description" class="form-control"  rows="5">@if($setting) {{$setting->description}} @endif</textarea>
                        </div>

                        <h4>Seo Meta Tags</h4>
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" @if($setting) value="{{$setting->meta_title}}" @endif  name="meta_title" required>
                        </div>

                        <div class="mb-3">
                            <label for="">Meta Keywords</label>
                            <input type="text" class="form-control" @if($setting) value="{{$setting->meta_keyword}}" @endif name="meta_keywords" required>
                        </div>

                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description"  class="form-control"  rows="5"> @if($setting) {{$setting->meta_description}} @endif</textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                        

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
