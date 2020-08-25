<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;
use DB;

class BlogController extends Controller
{
    public function home_view(){
        $category = \App\category::all();
        $brands = \App\brand::all();
        $posts = \App\Post::all();
        return view('frontend.blog.home',compact('category','brands','posts'));
    }

    public function index(){
        $posts = DB::table('posts')->get()->all();
        //dd($posts);
        return view('backend.blog.index',compact('posts'));
    }

    public function create(){
        return view('backend.blog.add');
    }

    public function store(Request $request)
    {
        $this->AdminCheckAuth();
        $post = new \App\Post ;

        //validate form data field
        $validatedData = $request->validate([
            'post_title' => 'required',
            'post_description' => 'required',   
        ]);
        

        $post->post_title = request('post_title');
        $post->post_description = request('post_description');
        $post->posted_by = Session::get('admin_name');
        $file = $request->file('post_image');
        if($file){
            $filename = 'post_image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media',$filename);
            $post->post_image = $path ;
        }

        $post->save();

        return redirect('/dashboard/blog') ;

        
    }

    public function AdminCheckAuth()
     {
         $id = Session::get('admin_id');
         if($id){
             return;
         }else{
             return redirect('/admin-login')->send();
         }
     }
}
