<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
public function index(){
    return view('welcome');
}
public function dashboard(){
    $posts = Post::where('user_id', Auth::user()->id)->get();
    return view('pages.dashboard')->with('posts', $posts);

}
public function user_post($post_id){
    $post = Post::findOrFail($post_id);
    $data = [
        'post' => $post,
        'post_id' => $post_id,
    ];
    return view('pages.posts.user_post')->with('data', $data);

}
public function edit_post(){
    return view('pages.posts.edit_post');

}
}