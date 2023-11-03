<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    

    public function store(Request $request)
    {
        if(Auth::check()){

            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'

            ]);

            if($validator->fails()){
                return redirect()->back()->with('message', 'Comment area is mandetory');
            }

            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();

            if($post){
                Comment::create([
                    'post_id'      =>$post->id,
                    'user_id'      =>Auth::user()->id,
                    'comment_body' =>$request->comment_body
                ]);
            }else{
                return redirect()->back()->with('message', 'No post found');
            }

            return redirect()->back()->with('message', 'Comment Successfully Added');

        }else{
            return redirect('/login')->with('message', 'Login first to comment');
        }

    }

    public function destroy(Request $request)
    {
        if(Auth::check()){
            $comment  = Comment::where('id', $request->comment_id)
                    ->where('user_id',Auth::user()->id)
                    ->first();

    
                    if($comment){
                        $comment->delete();

                        return response()->json([
                            'status'=>200,
                            'message'=>'Comment Deleted Successfully Done!'
                        ]);
                    }else{
                        return response()->json([
                            'status'=>500,
                            'message'=>'Something went wrong!'
                        ]);
                    }


        }else{
            return response()->json([
                'status'=>401,
                'message'=>'Login to delete this comment!'

            ]);
        }
    }

}
