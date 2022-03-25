<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;

use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function store(Request $request)
    {
        $post = new Post() ;
        $post->title = $request->title ;
        $post->description = $request->description ;
        $post->website_id = $request->website_id ;

        // check if post website id exist in database
        $website = null;
        $website = Website::find($post->website_id);

        if($website == null) {
            return response([
                'Message' => 'Website not found'
            ],Response::HTTP_NOT_FOUND);
        }

        $post->save();
        return response([
            'Message' => 'Post created'
        ],Response::HTTP_CREATED);
    }
}
