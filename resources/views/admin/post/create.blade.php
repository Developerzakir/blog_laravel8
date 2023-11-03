@extends('layouts.master')

@section('title', 'Add Post')

@section('content')

<div class="container-fluid">
    <div class="card">

        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>
                {{$error}}
            </div>
            @endforeach
        </div>
        @endif

        <div class="card-header">
            <h4>Add Post</h4>
        </div>

        <div class="card-body">
            <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id"  class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                   <textarea name="description"  rows="5" id="my_summernote" class="form-control "></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Video Link</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>

                <h4>SEO TAGS</h4>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description"  rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword"  rows="5" class="form-control"></textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" id="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary float-end" value="Save Post">
                        </div>
                    </div>
                </div>



                
            </form>
        </div>
    </div>
</div>

@endsection