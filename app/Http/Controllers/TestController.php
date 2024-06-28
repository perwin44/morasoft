<?php

namespace App\Http\Controllers;

use App\Jobs\ActiveUsersJob;
use App\Jobs\SendMailJobs;
use App\Mail\SendMailUsers;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use App\Traits\TestTrait;
use App\Traits\UploadImagesTrait;
use App\UploadImagesTrait\UploadImagesTrait as UploadImagesTraitUploadImagesTrait;
//use App\UploadImagesTraits\UploadImagesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    use UploadImagesTrait;
    use TestTrait;
    public function index(){
        // $user=User::all();
        // return $user;

        // $posts=Post::all();
        // return $posts;

        $user=$this->getData(new User());
        //return $user;

        // $user=$this->getData(User::class);
        // return $user;

        $posts=$this->getData(Post::class);
        //return $posts;

        $name=User::name()->get();
        return $name;
    }

    public function index1(){
        //return User::all()->dd();
        //return abort('403');
        $user=User::where('name',UserName())->get();
        return $user;
    }

    public function index2(){
         $user_ids=User::where('status',1)->pluck('id');
        // foreach($user_ids as $ids){
        //     User::where('id',$ids)->update([
        //         'status'=>1
        //     ]);
        // }

        ActiveUsersJob::dispatch($user_ids)->delay(now()->second(40));
            return "uploading";

    }

    public function sendMail(){

        $data=[
            'pnonjida@gmail.com',
            'pnonjida@gmail.com',
            'pnonjida@gmail.com',
            'pnonjida@gmail.com',
        ];

        SendMailJobs::dispatch($data);
        // foreach($data as $email){

        //     Mail::to($email)->send(new SendMailUsers());
        // }

        return "uploading";
    }

    public function showForm(){
        //return view('upload');
        $images=Image::all();
        return view('index',compact('images'));
    }

    public function store(Request $request){

        $path= $this->uploadImage($request,'admins');
        Image::create([
            'path'=>$path,
        ]);
        return "upload successfully";

        // $image=$request->file('photo')->getClientOriginalName();
        // $path = $request->file('photo')->storeAs('users',$image,'alaa');
        // return $path;

    }

    // public function store2(Request $request){
    //     $image=$request->file('photo')->getClientOriginalName();
    //     $path = $request->file('photo')->storeAs('admins',$image,'alaa');
    //     return $path;

    // }

    public function showImage(){
        $images=Image::all();
        return view('index',compact('images'));
    }
}
