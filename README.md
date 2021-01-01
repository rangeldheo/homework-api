

## Rodando projeto

Clone o projeto e rode composer install

## Configurando .env

Crie um arquivo .env na pasta raiz e configure o acesso a base de dados

As configurações básicas seguem a convenção do Laravel. Usei MySql

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homework_api
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

## Criando mockup de dados

Rode o comando: php artisan migrate --seed para preeencher 
o banco de dados e utilizar dados fakes para testes

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
