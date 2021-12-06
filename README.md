## Projeto - Space Flight News

É um projeto com o objetivo de listar os dados dos artigos, com o título, imagem, resumo e data de publicação via API.

## Tecnologias Usadas

- [Laravel 8](https://laravel.com/).
- [Livewire](https://laravel-livewire.com/).
- [Laravel Dusk](https://laravel.com/docs/8.x/dusk).
- [database ORM](https://laravel.com/docs/eloquent).
- [MYSQL](https://www.mysql.com/).

## Instruções de Instalação

1 - Clone o projeto pelo GIT ou clicando em Download
2 - Entre na pasta do projeto e instale o composer (composer install)
3 - Configure o arquivo .env (crie o arquivo conforme o exemplo .env.example)
4 - Rode os migrations (php artisan migrate)
5 - Execute o sistema (php artisan serve)

## Formas de consumir a API (trazers os artigos para a base local)

#### Exemplo 1

1 - Execute a aplicação (php artisan serve)
2 - Vá até a rota (http://127.0.0.1:8000/consumir-api) e aguarde a mensagem "Artigos armazenados com sucesso" (pode demorar um pouco, dependendo da sua conexão)

#### Exemplo 2

1 - No diretório do projeto, abra o terminal
2 - Execute o comando php artisan articles:cron e aguarde

## Projeto desafio Coodesh

This is a challenge by [Coodesh](https://coodesh.com/)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
