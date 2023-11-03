@extends('layouts.master')

@section('title', 'Update Post')

@section('content')

<div class="container-fluid">
    <div class="card">

        <div class="card-header">
            <h4>Update Post</h4>
        </div>

        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>
                    {{$error}}
                </div>
                @endforeach
            </div>
            @endif

            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id"  class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}" {{$post->category_id == $item->id ? 'selected':''}}>
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                   <textarea name="description" id="my_summernote"  rows="5" class="form-control">{{$post->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube Video Link</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>

                <h4>SEO TAGS</h4>

                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description"  rows="5" class="form-control">{{$post->meta_description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea name="meta_keyword"  rows="5" class="form-control">{{$post->meta_keyword}}</textarea>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{$post->status == '1' ? 'checked':''}}>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary float-end" value="Update Post">
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection