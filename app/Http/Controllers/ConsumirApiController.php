<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumirApiController extends Controller
{
    public function index()
    {
        $total = Http::get('https://api.spaceflightnewsapi.net/v3/articles/count');
        $response = Http::get("https://api.spaceflightnewsapi.net/v3/articles?_limit=$total");
        $data = json_decode($response);

        for($i = 0; $i < count($data); $i++) {

            $existe = Article::where('title', $data[$i]->title)->first();

            if(is_null($existe)) {
                Article::create([
                    'featured' => $data[$i]->featured,
                    'title' => $data[$i]->title,
                    'url' => $data[$i]->url,
                    'imageUrl' => $data[$i]->imageUrl,
                    'newsSite' => $data[$i]->newsSite,
                    'summary' => $data[$i]->summary,
                    'publishedAt' => $data[$i]->publishedAt
                ]);
            }
        }

        return 'Artigos armazenados com sucesso';
    }
}
