
# API Hotelaria





## Utilização do Projeto

```bash
  1. Clone esse projeto git@github.com:aziulll/Api-Hotelaria.git 

  2. Faça a instalação de um Ambiente de Desenvolvimento PHP

  2.2. Para testes em ambiente docker seguir em: 
  https://github.com/aziulll/Api-Hotelaria-docker

  3. Crie um DataBase chamado Hotelaria 

  Com base nas informações, lembre-se de configurar o 
  .env de acordo com as suas configurações no PostgreSQL

  DB_CONNECTION=pgsql
  DB_HOST=127.0.0.1
  DB_PORT=5432
  DB_DATABASE=hotelaria
  DB_USERNAME={seu_usuario_postgres}
  DB_PASSWORD={sua_senha_postgres}

```
    
## Documentação da API - Itens Obrigatórios 

#### Retorna uma lista de quartos disponíveis para reserva 

```http
  GET /api/quartos/disponivel
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `-` | `-` |- |



#### Encontra todos os quartos que estão ocupados em uma data específica

```http
  GET /api/quartos/ocupados
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `data_inicial, data_final`      | `date` | **Obrigatório**. A data da busca |

Exemplo:

{
    "data_inicial": "2023-08-20",
    "data_final": "2023-08-30"
}
#### Retorna todas as reservas do cliente

```http
  GET /api/reservas/{clienteId}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `ID`      | `number` | **Obrigatório**. Id do cliente|

## Melhorias

Melhorias aplicadas ao teste: 

- Cadastro de Reservas, Clientes e Quartos
- Autenticação do Cliente para acesso às rotas 



## Documentação da API - Itens Adicionais

#### Criação de quartos

```http
  POST /api 
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `-` | `-` |- |



## Consultas SQL 

Busca todos os quartos ocupados dentro da data especifica

```Bash
SELECT q.*
FROM quartos q
JOIN reservas r ON q.id = r.quarto_id
WHERE r.data_checkin <= '2023-08-20' 
  AND r.data_checkout >= '2023-08-30';
  AND q.disponivel = false;
  ```
## Stack utilizada

**Back-end:** Laravel, PostgreSQL
**Add**: Docker or Xampp
**Versões**: Php - 8.2, Laravel - 10, PostgreSQL - 16

