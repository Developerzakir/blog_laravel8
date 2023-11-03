@extends('layouts.app')

@section('title', "$settings->meta_title")
@section('meta_description', "$settings->meta_description")
@section('meta_keyword', "$settings->meta_keyword")


@section('content')
   
<div class="bg-danger py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach($category as $cat)

                    <div class="item">
                        <a href="{{url('tutorial/'.$cat->slug)}}" class="text-decoration-none">
                            <div class="card">
                                <img width="286px" height="221px" src="{{asset('uploads/category/'.$cat->image)}}" alt="image">
                                <div class="card-body">
                                    <h2 class="text-dark text-center">{{$cat->name}}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-2 bg-primary">
    <div class="container">
        <div class="text-center text-light p-3">
            <h3>Advertise Here</h3>
        </div>
    </div>
    
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Blog Website</h3>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, odio! Est quasi cumque ab neque! Quia ipsum sed architecto esse ut, assumenda amet neque eos corporis error, enim natus! Impedit tempora veritatis eum nostrum earum possimus velit, nobis facere minima esse iure eius sequi et dicta! Excepturi magni esse amet sed saepe, qui delectus unde sequi quo et dolores, eius nostrum, eaque temporibus minus tenetur dolorum! Maxime animi ipsam iure, accusamus facilis omnis eos aspernatur quas repudiandae veniam iste quis obcaecati illo accusantium aliquid quo, dolores voluptatibus perspiciatis commodi. Maxime, libero laboriosam. Commodi eveniet vel architecto autem nemo deleniti? Consequuntur?
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-info">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>All Category Lists</h3>
                <div class="underline"></div>
            </div> 
            
            @foreach($category as $cat)
            <div class="col-md-3 mt-1">
            <div class="card card-body ">
                <a href="{{url('tutorial/'.$cat->slug)}}" class="text-decoration-none">
                    <h5 class="text-dark">{{$cat->name}}</h5>
                </a>
            </div>
            </div>
            @endforeach   
        </div>
    </div>
</div>

<div class="py-5 bg-secondary">
    <div class="container ">
        <div class="row">
            <div class="col-md-8">
                <h3>All Post Lists</h3>
                <div class="underline"></div>

                @foreach($latestPosts as $postItem)
            <div class="card card-body mt-1">
                <a href="{{url('tutorial/'.$postItem->category->slug. '/'.$postItem->slug)}}" class="text-decoration-none">
                    <h5 class="text-dark">{{$postItem->name}}</h5>
                </a>
                <h6>Posted On: {{$postItem->created_at->format('d-m-Y')}}</h6>
            </div>
            @endforeach 
            </div> 

            <div class="col-md-4">
                <div class="text-center text-light p-3">
                    <h3>Advertise Here</h3>
                </div>
            </div>
            
              
        </div>
    </div>
</div>
@endsection