@extends('layouts.master')

@section('title', 'Category')

@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{url('admin/delete-category')}}" method="POST">
      @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="categoryDeleteId" id="category_id">
          are you sure you want to delete this category?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Yes Delete</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div class="container-fluid px-4">
    

    <div class="card mt-3">
        <div class="card-header">
            <h4>
                View Category <a href="{{url('admin/add-category')}}" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>

        <div class="card-body">

            @if(session('message'))
             <div class="alert alert-success">{{session('message')}}</div> 
            @endif

<div class="table-responsive">
            <table id="myTable" class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($category as $cat)
                  <tr>
                    <th scope="row">{{$cat->id}}</th>
                    <td>{{$cat->name}}</td>
                    <td>
                        <img width="100px" height="100px" src="{{asset('uploads/category/'.$cat->image)}}" alt="">
                    </td>
                    <td>{{$cat->status == "1" ? "Hidden":'Shown'}}</td>
                    <td>
                        <a href="{{url('admin/edit-category/'.$cat->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        {{-- <a href="{{url('admin/delete-category/'.$cat->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}

                        <button type="submit" class="btn btn-danger btn-sm deleteCategoryBtn" value="{{$cat->id}}">Delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click', '.deleteCategoryBtn', function(e){
      e.preventDefault();

      var category_id = $(this).val();
      $('#category_id').val(category_id);
      $('#deleteModal').modal('show');
    })
  })
</script>

@endsection