<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Articles extends Component
{
    use LivewireAlert;

    //VARIÁVEIS PARA LISTAGEM
    public $perPage = 10;
    public $currentPage = 0;
    public $search;
    public $sortAsc = 'desc';

    //VARIÁVEIS DO FORM
    public $article_id;
    public $title;
    public $url;
    public $imageUrl;
    public $newsSite;
    public $summary;
    public $publishedAt;

    public $updateMode = false;

    protected $queryString = ['search'];

    //REGRAS DE VALIDAÇÃO
    protected $rules = [
        'title' => 'required|max:255',
        'url' => 'required|max:255',
        'imageUrl' => 'required|max:255',
        'newsSite' => 'required|max:255',
        'summary' => 'required',
        'publishedAt' => 'required',
    ];

    //LIMPA OS CAMPOS
    private function resetInputFields(){
        $this->title = '';
        $this->url = '';
        $this->imageUrl = '';
        $this->newsSite = '';
        $this->summary = '';
        $this->publishedAt = '';
    }

    //MONTA A PÁGINA
    public function mount($page = 0)
    {
        $this->currentPage = $page;
    }

    //RENDERIZA A PÁGINA
    public function render()
    {
        $articles = Article::where('title', 'like', '%'.$this->search.'%')
                ->orderBy('publishedAt', $this->sortAsc)
                ->paginate($this->perPage);
        return view('livewire.articles', ['articles' => $articles]);
    }

    //CARREGA MAIS ARTIGOS
    public function loadMore()
    {
        $this->perPage = $this->perPage+10;
    }

    //REGISTRA ARTIGO
    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'url' => $this->url,
            'imageUrl' => $this->imageUrl,
            'newsSite' => $this->newsSite,
            'summary' => $this->summary,
            'publishedAt' => $this->publishedAt
        ]);

        $this->resetInputFields();

        $this->alert('success', 'Artigo criado com sucesso!');
    }

    //ABRE MODAL PARA EDITAR
    public function edit($id)
    {
        $article = Article::where('id', $id)->first();

        $this->article_id = $id;
        $this->title = $article->title;
        $this->url = $article->url;
        $this->imageUrl = $article->imageUrl;
        $this->newsSite = $article->newsSite;
        $this->summary = $article->summary;
        $this->publishedAt = $article->publishedAt;
    }

    //REGISTRA DADOS EDITADOS
    public function update()
    {
        $this->validate();

        if ($this->article_id) {
            $article = Article::find($this->article_id);
            $article->update([
                'title' => $this->title,
                'url' => $this->url,
                'imageUrl' => $this->imageUrl,
                'newsSite' => $this->newsSite,
                'summary' => $this->summary,
                'publishedAt' => $this->publishedAt
            ]);

            $this->resetInputFields();
            $this->alerta('success', 'Artigo atualizado com sucesso!');
        }
    }

    //EXIBE A MODAL PERGUNTADO SE QUER MESMO DELETAR
    public function showDeleteModal($id)
    {
        $article = Article::where('id', $id)->first();
        $this->article_id = $id;
    }

    //DELETAR ARTIGO
    public function delete()
    {
        if($this->article_id){
            Article::where('id', $this->article_id)->delete();
            $this->alerta('success', 'Artigo removido com sucesso!');
        }
    }

    //ALERTA
    private function alerta($type, $message)
    {
        $this->alert($type, $message, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
