<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        return Article::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        Article::create($request->all());

        return response()->json([
            "message" => "record created"
        ], 201);
    }

    public function show($id)
    {
        return Article::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return response()->json([
            "message" => "record updated"
        ], 200);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json([
            "message" => "record deleted"
        ], 202);
    }
}
