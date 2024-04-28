<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){

        $postsFromDB = Post::all();

        return view('posts.index',['posts'=>$postsFromDB]);
    }

    public function show(Post $post){
        //$singlePost = ['id'=>1,'title'=>'PHP','description'=>'Programming language for backend web development','email'=>'mokeddemamine1707@gmail.com','posted_by'=>'Amine','created_at'=>'2024/3/18'];
        //$singlePost = Post::findOrFail($post);
        //if(is_null($singlePost)){
         //   return to_route('posts.index');
        //}
        
        //$singlePost = Post::where('id',$post)->first();
        
        //$singlePost = Post::where('id',$post)->get();
        
        return view('posts.show',['post'=>$post]);
    }

    public function create(){

        $users = User::all();
        return view('posts.create',['users'=>$users]);
    }

    public function store(){

        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:10'],
            'creator'   => ['required','exists:users,id'],
        ]);
        // get the post data
        $title = request()->title;
        $description = request()->description;
        $creator = request()->creator;
        // store the data into DB
        /*$post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->save();*/
        
        Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id' => $creator
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post){

        $users = User::all();

        return view('posts.edit',['post'=>$post,'users'=>$users]);
    }

    public function update($post){

        request()->validate([
            'title'     => ['required','min:3'], 
            'description'=> ['required','min:10'],
            'creator'   => ['required','exists:users,id']
        ]);
        
        $title = request()->title;
        $description = request()->description;
        $creator = request()->creator;

        $getPost = Post::find($post);
        $getPost->update([
            'title'=>$title,
            'description'=>$description,
        ]);
        
        return to_route('posts.show',$post);
    }

    public function destroy($post){

        //$getPost = Post::find($post);
        //$getPost->delete();

        Post::where('id',$post)->delete();
        return to_route('posts.index');
    }
}
