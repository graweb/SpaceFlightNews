<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SystemTest extends DuskTestCase
{
    /** @test */
    public function order_articles()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->select('sortAsc', 'asc')
                ->pause(3000)
                ->select('sortAsc', 'desc')
                ->pause(3000)
                ->assertSee('NovoArtigo')
                ->pause(3000);
        });
    }

    /** @test */
    public function search_article()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->type('search', 'Arianespace scrubs')
                ->pause(3000)
                ->assertSee('NovoArtigo')
                ->pause(3000);
        });
    }

    /** @test */
    public function show_more_article()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->press('Carregar mais')
                ->pause(3000)
                ->driver->executeScript('window.scrollTo(0,document.body.scrollHeight);');
        });
    }

    /** @test */
    public function new_article()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->press('Novo artigo')
                ->pause(2000)
                ->type('title', 'Título do Artigo')
                ->type('url', 'https://coodesh.com/blog/dicionario/o-que-e-cors/')
                ->type('imageUrl', 'https://coodesh.com/blog/wp-content/uploads/2021/12/Dicionario-Tech-3-1152x648.png')
                ->type('newsSite', 'News Site')
                ->type('publishedAt', '05/12/2021')
                ->type('summary', 'Todo desenvolvedor Front-end já se deparou com o CORS no desenvolvimento web. Mas, afinal, o que é CORS? Em resumo, é o compartilhamento de recursos com origens diferentes. Ele é essencial para garantir a navegação segura ao usuário, evitar a ação de crackers e o acesso de websites maliciosos.')
                ->pause(2000)
                ->press('Salvar')
                ->pause(3000);
        });
    }

    /** @test */
    public function see_article()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->clickLink('Ver mais')
                ->pause(3000);
        });
    }

    /** @test */
    public function edit_article()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->press('Editar')
                ->pause(2000)
                ->type('title_edit', 'Editar - Título do Artigo')
                ->type('url_edit', 'https://coodesh.com/blog/dicionario/o-que-e-cors/')
                ->type('imageUrl_edit', 'https://coodesh.com/blog/wp-content/uploads/2021/12/Dicionario-Tech-3-1152x648.png')
                ->type('newsSite_edit', 'News Site')
                ->type('publishedAt_edit', '06/12/2021')
                ->type('summary_edit', 'EDITAR - Todo desenvolvedor Front-end já se deparou com o CORS no desenvolvimento web. Mas, afinal, o que é CORS? Em resumo, é o compartilhamento de recursos com origens diferentes. Ele é essencial para garantir a navegação segura ao usuário, evitar a ação de crackers e o acesso de websites maliciosos.')
                ->pause(2000)
                ->press('Salvar')
                ->pause(3000);
        });
    }

    /** @test */
    public function delete_article()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->press('Remover')
                ->pause(2000)
                ->press('Sim')
                ->pause(3000);
        });
    }
}
