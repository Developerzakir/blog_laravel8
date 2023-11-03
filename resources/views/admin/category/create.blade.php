@extends('layouts.master')

@section('title', 'Add Category')

@section('content')

<div class="container-fluid px-4">

    <div class="card">
        <div class="card-header">
          <h1 class="mt-4">Add Category</h1>
        </div>

        <div class="card-body">

            @if($errors->any())

            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>{{$error}}</div>

            @endforeach
           </div>

            @endif




            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="categoryName" class="form-label">Category Name</label>
                  <input type="text" class="form-control" id="categoryName" name="name">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="5" class="form-control" id="description" name="description"></textarea>
                </div>

                
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <h6>Seo Tags</h6>
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control"   rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label  class="form-label">Meta Keyword</label>
                    <textarea name="meta_keyword" class="form-control" rows="5"></textarea>
                </div>


                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label  class="form-label">Navbar Status </label>
                            <input type="checkbox" name="navbar_status">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label  class="form-label">Status </label>
                            <input type="checkbox" name="status" >
                        </div>
                    </div>
                    
                </div>
                
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
  
</div>

@endsection