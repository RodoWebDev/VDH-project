<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use Auth;
use Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function getAllPosts()
    {
        $posts = Post::with('post_images')->orderBy('created_at', 'desc')->get();
        return response()->json(['error' => false, 'data' => $posts]);
    }

    public function createPost(Request $request)
    {
        DB::transaction(function () use ($request) {
            $user = Auth::user();
            $credential = $request->credential;
            $images = $request->images;

            $post = Post::create([
                'credential' => $credential,
                'user_id' => $user->id,
            ]);
            // store each image
            foreach($images as $image) {
                $imagePath = Storage::disk('uploads')->put($user->email . '/posts/' . $post->id, $image);
                PostImage::create([
                    'post_image_caption' => $image->getClientOriginalName(),
                    'post_image_path' => '/uploads/' . $imagePath,
                    'post_id' => $post->id
                ]);
            }
        });
        return response()->json(200);
    }
}
