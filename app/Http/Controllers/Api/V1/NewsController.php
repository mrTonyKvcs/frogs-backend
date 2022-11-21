<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json([
            "success" => true,
            "message" => "All News",
            "data" => NewsResource::collection($news)
        ]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return response()->json([
            "success" => true,
            "message" => "Get News",
            "data" => new NewsResource($news)
        ]);
    }
}
