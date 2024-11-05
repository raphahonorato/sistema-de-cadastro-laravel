## Sistema de cadastro

Neste projeto construi uma demonstração de um sistema de cadastro de produtos.

Na página principal são exibidos alguns formulários para realizar as devidas chamadas a API, criar e editar um produto, e logo abaixo se encontra a tabela com todos os produtos cadastrados no banco de dados MySQL.

Em cada linha da tabela se encontra o botão para exclusão do respectivo produto, ao excluí-lo, automaticamente a tabela é atualizada com a nova lista de produtos.


### Clone o repositório

``` bash
git clone git@github.com:raphahonorato/sistema-de-cadastro-laravel.git
cd sistema-de-cadastro-laravel
```

### Instale as dependências

``` bash
composer install
```


### Duplique o arquivo `.env.example` e renomeie para `.env`

``` bash
cp .env.example .env
```

### Execute as migrações para criar as tabelas do banco de dados

``` bash
php artisan migrate
```

### Popule o banco de dados com dados iniciais:

``` bash
php artisan db:seed
```

### Para iniciar o servidor de desenvolvimento

``` bash
php artisan serve
```

### Rotas

| Método | Rota | Descrição |
|-------------|-------------|-------------|
|  POST   | /createProduct       | Cadastrar um novo produto.      |
| GET      | /      | Lista todos os produtos cadastrados.      |
| PUT      | /editProduct/{id}      | Atualiza um produto com base no ID.      |
|     DELETE     |    /products/{id}    |  Apaga um produto com base no seu ID.  |