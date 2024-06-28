<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CreatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    //
    public function showUsers(){
        return "users";
    }

    public function createPost(){
        return view('posts.create');
    }

    public function create(){
        return view('posts.create');
    }

    public function insert(Request $request){
        //return $request;
        DB::table('posts')->insert([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return response('added successfully');
    }

    public function index(){
        $posts=DB::table('posts')->get();
        return view('posts.index',compact('posts'));
    }

    public function edit($id){
        $post=DB::table('posts')->where('id',$id)->first();
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request,$id){
        DB::table('posts')->where('id',$id)->update([
        'title'=>$request->title,
        'body'=>$request->body
        ]);
        //return response('updated successfully');
        return redirect()->route('posts');
    }

    public function delete($id){
        DB::table('posts')->where('id','=',$id)->delete();
        return redirect()->route('posts');
    }

    //public function deleteAll(){
        //DB::table('posts')->delete();
  //      return 'hi';
   // }

    public function deleteAllTruncate(){
        DB::table('posts')->truncate();
        return redirect()->route('posts');
    }

    public function deleteAll_old(){
        //dd("test");
        //DB::table('posts')->delete();
        $posts = Post::all();
        foreach($posts as $post){
            $post->delete();
        }
        return redirect()->back();
    }
    public function deleteAll()
    {
        // Use a single query to delete all posts
        Post::query()->delete();

        return redirect()->back()->with('success', 'All posts have been deleted.');
    }

    public function index1(){
        //$post=Post::find(2);
        //return $post->comments;

        // foreach($post->comments as $comment){
        //     echo  $comment->body;

        // }


        $comment=Comment::find(3);
        return $comment->post;
    }

    public function index2(){
        return "inde2";
    }

    public function hani(Request $request){
        $post=Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);
        $users=User::where('id','!=',auth()->user()->id)->get();

        $user_create=auth()->user()->name;

        Notification::send($users,new CreatePost($post->id, $user_create,$post->title));
        return redirect()->route('dashboard');
    }

    public function show($id){

        //return $id;
        $post=Post::findOrFail($id);
        $getID=DB::table('notifications')->where('data->post_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$getID)->update(['read_at'=>now()]);
        return $post;
    }
    public function markAsRead(){
        $user=User::find(auth()->user()->id);
        foreach($user->unreadNotifications as $notification){
            //$notification->markAsRead();
            $notification->delete();
        }
        return redirect()->back();
    }
}

