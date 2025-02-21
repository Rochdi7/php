<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;
class HomeController extends Controller
{
    public function blog()
    {
        // $allcategories = ['categorie1', 'categorie2'];
        // $allCategories = DB::table('categories')->get(); 
        $allCategories = Category::all();
        // $posts = Post::orderBy('id', 'desc')->get(); 
        $posts = Post::latest()->get(); 
        return view('blog', compact('allCategories', 'posts'));
        
    }
}
