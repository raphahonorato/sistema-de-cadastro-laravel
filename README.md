## Sistema de cadastro

Neste projeto construi uma demonstração de um sistema de cadastro de produtos.

É composto por alguns formulários que realizam as devidas chamadas a API, criar, exibir, editar e excluir um produto, todos os produtos cadastrados no banco de dados MySQL.

Em cada linha da tabela se encontra o botão para exclusão do respectivo produto, ao excluí-lo, automaticamente a tabela é atualizada com a nova lista de produtos.

O projeto encontra-se hospedado na Heroku. Pode ser acessado através dessa url.

<https://rhcode.com.br>

Realizei algumas configurações de deploy automático no github.

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

### Para iniciar o servidor de desenvolvimento

``` bash
php artisan serve
```

### Rotas

| Método | Rota | Descrição |
|-------------|-------------|-------------|
| GET      | /products      | Lista todos os produtos cadastrados.      |
|  POST   | /products/create       | Cadastrar um novo produto.      |
| PUT/PATCH      | /products/{productId}/edit      | Atualiza um produto com base no ID.      |
|     DELETE     |    /products/{productId}    |  Apaga um produto com base no seu ID.  |

## **GET** `/products`

### **Headers**

- `Accept`: `application/json`

### **Resposta**

**Status Code: 200 OK**

```bash
{
    "csrf_token": "3kI956a9BFKE0xJQuxmM2JpxGQfYJeONpVs09SQn",
    "products": [
        {
            "id": 1,
            "name": "exemplo nome",
            "description": "exemplo descrição",
            "quantity": 1,
            "created_at": "2024-11-06T19:20:06.000000Z",
            "updated_at": "2024-11-06T23:32:45.000000Z"
        },
        {
            "id": 2,
            "name": "exemplo2 nome",
            "description": "exemplo2 descrição",
            "quantity": 2,
            "created_at": "2024-11-06T19:20:06.000000Z",
            "updated_at": "2024-11-06T23:32:45.000000Z"
        }
    ]
}
```

## **POST** `/products/create`

### **Headers**

- `Accept`: `application/json`

- `X-CSRF-TOKEN`: `{csrf_token}`

### **Resposta**

**Status Code: 201 CREATED**

```bash
{
    "csrf_token": "3kI956a9BFKE0xJQuxmM2JpxGQfYJeONpVs09SQn",
    "products": [
        {
            "id": 1,
            "name": "exemplo nome",
            "description": "exemplo descrição",
            "quantity": 2,
            "created_at": "2024-11-06T19:20:06.000000Z",
            "updated_at": "2024-11-06T23:32:45.000000Z"
        }
    ]
}
```

## **PUT/PATCH** `/products/{productId}/edit`

### **Headers**

- `Accept`: `application/json`

- `X-CSRF-TOKEN`: `{csrf_token}`

### **Body**

```bash
{
    "name": "exemplo nome",
    "description": "exemplo descrição",
    "quantity": 1
}

```

### **Resposta**

**Status Code: 200 OK**

```bash
{
    "message": "Produto atualizado com sucesso!",
    "product": {
        "id": 1,
        "name": "exemplo nome",
        "description": "exemplo descrição",
        "quantity": 1,
        "created_at": "2024-11-06T23:40:08.000000Z",
        "updated_at": "2024-11-06T23:41:11.000000Z"
}

```


## **DELETE** `/products/{productId}`

### **Headers**

- `Accept`: `application/json`

- `X-CSRF-TOKEN`: `{csrf_token}`

**Status Code: 200 OK**

```bash
{
    "message": "Produto excluído com sucesso!",
    "product_id": "27"
}
```