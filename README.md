## Projeto - Space Flight News

É um projeto com o objetivo de listar os dados dos artigos, com o título, imagem, resumo e data de publicação via API.

## Tecnologias Usadas

- [Laravel 8](https://laravel.com/).
- [Livewire](https://laravel-livewire.com/).
- [Laravel Dusk](https://laravel.com/docs/8.x/dusk).
- [database ORM](https://laravel.com/docs/eloquent).
- [MYSQL](https://www.mysql.com/).
- [Postman](https://www.postman.com/).

## Instruções de Instalação

<p>1 - Clone o projeto pelo GIT ou clicando em Download</p>
<p>2 - Entre na pasta do projeto e instale o composer (composer install)</p>
<p>3 - Configure o arquivo .env (crie o arquivo conforme o exemplo .env.example)</p>
<p>4 - Rode os migrations (php artisan migrate)</p>
<p>5 - Execute o sistema (php artisan serve)</p>

## Formas de consumir a API (trazers os artigos para a base local)

#### Exemplo 1

<p>1 - Execute a aplicação (php artisan serve)</p>
<p>2 - Vá até a rota <b>"/consumir-api"</b> e aguarde a mensagem "Artigos armazenados com sucesso" (pode demorar um pouco, dependendo da sua conexão)</p>

#### Exemplo 2

<p>1 - No diretório do projeto, abra o terminal</p>
<p>2 - Execute o comando php artisan articles:cron e aguarde</p>

## Executando Testes

Nesse projeto, usei o Laravel Dusk para fazer os testes E2E. Criei apenas um arquivo de testes para facilitar o entendimento.

#### Executar todos os testes de uma vez
<p>1 - Dentro do projeto, abra o terminal</p>
<p>2 - Execute o comando php artisan dusk</p>

#### Executar um teste de uma vez
<p>1 - Dentro do projeto, abra o terminal</p>
<p>2 - Execute o comando php artisan dusk --filter order_articles</p>

<p>order_articles</p>
<p>search_article</p>
<p>show_more_article</p>
<p>new_article</p>
<p>see_article</p>
<p>edit_article</p>
<p>delete_article</p>

## Executando a API no Postman

- [Link da API](https://documenter.getpostman.com/view/9738955/UVJhEaXT)

## Projeto desafio Coodesh

This is a challenge by [Coodesh](https://coodesh.com/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
