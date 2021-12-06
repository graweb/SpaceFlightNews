<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

class Articles extends Command
{
    protected $signature = 'articles:cron';
    protected $description = 'Armazena os novos artigos no banco de dados.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
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
        $this->info('Executado com sucesso');
        return Command::SUCCESS;
    }
}
