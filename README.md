# Flores e Abelhas

Apliacação web voltada para se realizar a consulta de flores e como elas se relacionam em relação as abelhas cadastradas
 
## Tecnlogias utilizadas
 - Laravel para o Back-End
 - MySQL para o Banco de Dados
 - HTML, CSS e JS para o Front-End
 - Materialize como Framework para o CSS
 - PHP 7.3


## Instalação
 Clone esse repositório na local que preferir

 ```
 git clone git@gitlab.com:vct.aragao/flores-e-abelhas.git
 ```

Entre na pasta do projeto e copie o arquivo .env-example para .env

```
cd flores-e-abelhas
cp .env.example .env
```

Crie seu banco de dados e mude as configurações no arquivo .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario_do_banco
DB_PASSWORD=senha_do_usuario
```
Instale as depências necessárias do PHP

```
composer install
```

Instale as depências necessárias do JS

```
npm install
```

Crie o link entre a a paste public e storage

```
php artisan storage:link
```

Gere a chave da aplicação

```
php artisan key:generate
```

Gere o banco de dados

```
php artisan migrate:fresh --seed
```

Coloque a aplicação no ar
```
php artisan serve
```

Versão online da aplicação no link: [flower.victormoraes.me](https://flower.victormoraes.me)
