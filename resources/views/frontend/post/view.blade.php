@extends('layouts.app')


@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")

@section('content')

   <div class="py-4">
       <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h3>{{$post->name}}</h3>
                    </div>
                    <div class="mt-3">
                        <h4>{{$post->category->name . ' / '. $post->name}}</h4>
                    </div>
                    <div class="card card-shadow mt-3">
                        <div class="card-body post-description post-code-bg">
                            <p>{!!$post->description!!}</p>
                        </div>
                    </div>

                    <div class="comment-area mt-4">

                        @if(session('message'))

                        <div class="alert alert-success">{{session('message')}}</div>

                        @endif

                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{url('comments')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{$post->slug}}">
                                <textarea name="comment_body" class="form-control"  rows="4" required></textarea>
                                <button class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>

                        @forelse($post->comments as $comment)

                        <div class="comment-container card card-body shadow-sm mt-2">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if($comment->user)
                                         {{ $comment->user->name}}
                                    @endif
                                    <small class="ms-3 text-primary">Commented on: {{ $comment->created_at->format('d-m-Y')}}</small>
                                </h6>
                                <p class="user-comment mb-1">
                                    {!! $comment->comment_body!!}
                                </p>
                            </div>
                            
                            @if(Auth::check() && Auth::id() == $comment->user_id)
                            <div>
                                <a href="" class="btn btn-primary btn-sm ms-2">Edit</a>
                                <button type="button" value="{{$comment->id}}" class="deleteComment btn btn-danger btn-sm ms-2">Delete</button>
                            </div>
                            @endif
                        </div>

                        @empty 
                            <div class="card card-body shadow-sm mt-2">
                                <h6>No Comment Yet.</h6>
                            </div>
                        @endforelse

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="border p-2 my-2">
                        <h4>Advertisng Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertisng Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertisng Area</h4>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Post</h4>
                        </div>

                        <div class="card-body">
                            @foreach($latestPost as $post)
                            <a href="{{url('tutorial/'.$post->category->slug.'/'.$post->slug)}}" class="text-decoration-none">
                                <h6> > {{$post->name}}</h6>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
           </div>
       </div>
   </div>

   @endsection

   @section('scripts')

   <script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.deleteComment', function(){
            
            if(confirm('Are you sure want to delete?'))
            {
                var thisClicked = $(this);
                var comment_id  = thisClicked.val();

                $.ajax({

                    type: 'POST',
                    url: '/delete-comment',
                    data: {
                        'comment_id': comment_id
                    },

                    success: function(res){

                        if(res.status == 200){
                            thisClicked.closest('.comment-container').remove();
                            alert(res.message);
                        }else{
                            alert(res.message);
                        }

                    }


                });

            }
        });

    });
   </script>
   @endsection