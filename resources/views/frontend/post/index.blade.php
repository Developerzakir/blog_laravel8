@extends('layouts.app')

@section('title', "$category->meta_title")
@section('meta_description', "$category->meta_description")
@section('meta_keyword', "$category->meta_keyword")

@section('content')

   <div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h3>{{$category->name}}</h3>
                </div>

                @forelse($post as $postItem)
                <div class="card card-shadow mt-3">
                    <div class="card-body">
                        <a href="{{url('tutorial/'.$category->slug.'/'.$postItem->slug)}}" class="text-decoration-none">
                           <h4 class="post-heading">{{$postItem->name}}</h4>
                        </a>
                        <h6>
                            Posted on: {{$postItem->created_at->format('d/m/Y')}}
                            <span class="ms-3">Posted By: {{$postItem->user->name}}</span>
                        </h6>
                    </div>
                </div>

                @empty 
                <div class="card card-shadow mt-3">
                    <div class="card-body">
                        <h4>No Post Found</h4>
                    </div>
                </div>

                @endforelse
             
                <div class="your-paginate mt-2">
                    {{$post->links()}}
                </div>

            </div>

            <div class="col-md-3">
                <div class="border p-2">

                    <h4>Advertising Area</h4>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection