<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        $website = new Website();
        $website->name = $request->name;
        $website->url = $request->url;
        $website->save();

        return response([
            'Message' => 'Website created'
        ],Response::HTTP_CREATED);
    }
}
