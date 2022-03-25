<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Website;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $subscribe = new Subscribe();
        $subscribe->user_id = $request->user_id;
        $subscribe->website_id = $request->website_id;

        // check if post website id exist in database
        $user = null;
        $user = Website::find($subscribe->website_id);

        $website = null;
        $website = Website::find($subscribe->user_id);

        if($user == null || $website == null ) {
            return response([
                'Message' => 'Website not found'
            ],Response::HTTP_NOT_FOUND);
        }

        $subscribe->save();
        return response([
            'Message' => 'Subscribe created'
        ],Response::HTTP_CREATED);
    }
}
