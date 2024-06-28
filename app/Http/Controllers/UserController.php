<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts=Post::all();
        //$posts=Post::get();
        //$post=Post::samir()->first();
        //return $post;

        //return view('indexx',compact('posts'));

        // $user=User::find(2)->phone;
        // return $user;

        // $phone=Phone::find(1);
        // return $phone->user;
    //     $user=User::find(2);
    //     return $user->roles;

    $role=Role::find(1);
    return $role->users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createe');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $post=new Post();
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();

        Post::create(
            $request->all()

        );

        // Post::create([
        //     'title'=>$request->title,
        //     'body'=>$request->body,
        // ]);

        return response('added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $posts=Post::onlyTrashed()->get();
        return view('softdelete',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$post=Post::findOrFail($id);
        $post=Post::where('id',$id)->first();

        // if($post){
        //     return $post;
        // }else{
        //     return response('no such an id');
        // }

        return view('editt',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::findOrFail($id);
        // $post->title=$request->title;
        // $post->body=$request->body;
        //  $post->save();
        $post->update([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);
         return redirect()->route('postss.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Post::findOrFail($id)->delete();
        Post::destroy($id);
        return redirect()->route('postss.index');
    }
    public function restore($id){
        Post::onlyTrashed()->where('id',$id)->restore();
        //$posts->restore();
        return redirect()->route('postss.index');
    }

    public function forceDelete($id){
        Post::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }

    public function index1($id){
        $user=User::find($id);
        return $user->name;

    }

    public function store1(){

        User::create([
            'name'=>'ali1',
            'email'=>'ali@gmail.com',
            'password'=>'123456',
        ]);
        return response('ok');
    }

}
