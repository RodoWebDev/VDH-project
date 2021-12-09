<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use Auth;
use Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function getAllPosts()
    {
        $posts = Post::with('post_images')->orderBy('created_at', 'desc')->get();
        return response()->json(['error' => false, 'data' => $posts]);
    }
}
