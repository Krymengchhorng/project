<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function homePage(){
        return view('/home');
    }
    public function aboutPage(){
        return view('about');

    }
    public function post(){
        $objPost  = DB::table('post')
            ->get();
        return view('list-post',['objPost'=>$objPost]);
    }

    public function postDetail($id){
        $objPost = DB::table('post')
            ->where('id',$id)
            ->get();
        return view('post-detail',['objPost'=>$objPost]);
    }
    public function addPost(){
        return view('add-post');

    }
    public function addPostSubmit(Request $r){
        $title = $r->input('title');
        $description =$r->input('description');

        $Post = DB::table('post')->insert([
            'title'=>$title,
            'description'=>$description
        ]);
        if($Post){
            return redirect('post');
        }
    }
    public function updatePost($id){
        $Post = DB::table('post')
            ->where('id',$id)
            ->get();
            return view('update-post',['post'=>$Post]);

    }
    public function updatePostSubmit(Request $r){
        $Post = DB::table('post')
            ->where('id',$r->id)
             ->update([
                'title'=>$r->title,
                'description'=>$r->description

             ]);
             if($Post){
                return redirect('post');
             }

    }
    public function removePost($id){
        return view('remove-post',['post'=>$id]);

    }
    public function removePostSubmit(Request $r){
        $Post = DB::table('post')
            ->where('id', $r->id)
            ->delete();
            if($Post){
                return redirect('post');
            }

    }

}

