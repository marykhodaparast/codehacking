<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;

class AdminController extends Controller
{
    public function index(){
       
       $postsCount = Post::count(); 
       $commentsCount = Comment::count();
       $categoriesCount = Category::count();

       return view('admin.index',compact('postsCount','commentsCount','categoriesCount'));
    }

}
