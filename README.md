# Apresentação
Neste projeto configura-se uma api responsável por fazer um crud no banco local, bastando utilizar as url's a seguir e não esquecer de especificar a action correta para cada manipulação. Eu criei uma layer simples de service com fim de abstrair um pouco o conceito de patterns porém mantendo o projeto simples que coubesse dentro do prazo. Construi uma interface simples apenas para mostrar os dados um pouco mais desenhados.

# Skills
- Php (framework - laravel)
- Mysql
- Serviços externos api
- Html

## Autor
- [@Shalomsantos](https://github.com/shalomsantos)

## Requisitos
- composer.
- xampp.
- IDE sugerida Vs Code.

# Build
## Instalação
Clone o projeto
```sh
git clone https://github.com/shalomsantos/newsApp.git
```

```sh
cd newsApp/
```

Crie o Arquivo .env
```sh
.env 
```

Atualize as variaveis de conexão com o banco
```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

## Estrutura das tabelas
| News||
| - | - |
| id       | INT     |
| id_type_news | INT(FK) |
| title    | VARCHAR |
| desc_news | VARCHAR |

| type_news||
| - | - |
| id       | INT     |
| type_news_desc | VARCHAR |

## Migrations e seeds
Migra o banco pre-pronto
```sh
php artisan migrate
```

popula alguns dados randon
```sh
php artisan db:seed --class=NewsSeeder
```
Rode o projeto
```sh
php artisan serve
```
Acesse o projeto
[NewsApp](http://localhost:8000)

# Responses do crud com a api
Retorna todos os registros (GET)
```sh
http://localhost:8000/api/news
```

Gerar registro (POST)
```sh
http://localhost:8000/api/news
```
Dados esperados
```sh
{
    "id_type_news" : number,
    "title" : strin,
    "desc_news" : string
}
```

Atualiza registro especificado (PATCH)
```sh
http://localhost:8000/api/news/{ID}
```
Dados a atualizar
```sh
{
    "id_type_news" : number,
    "title" : strin,
    "desc_news" : string
}
```

Busca por registro especificado (GET)
```sh
http://localhost:8000/api/news/{ID}
```

Remove registro especificado (DELETE)
```sh
http://localhost:8000/api/news/{ID}
```