Aplicativo de mapeamento de pontos de interesse
======================================

Tecnologias
------------
O back-end foi desenvolvido em `PHP` utilizando os frameworks `Laminas` (antigo Zend Framework 3) e `Laminas API Tools`.
A camada de teste utiliza o `PHPUnit`.
O banco de dados utilizado foi o `SQLite`.

Requerimentos
------------
PHP >= 7.2;
Apache >= 2.2.14;
Composer >= 1.6.4;
PDO_Sqlite.

Instalação
------------

### Via Docker (recomendado)

Neste caso, é necessário ter apenas o `docker` e `docker-compose` instalados.
Entre na pasta do projeto e execute os seguintes comandos:

```bash
# docker-compose build
# docker-compose up -d
# docker-compose run food-map composer build
```
Feito isso a aplicação já estará rodando na porta `8080`.
#### Documentação
A documentação da API poderá ser acessada em http://localhost:8080/api-tools/swagger/FoodMap-v1#/Local .

#### Testes 
Os testes de API pode ser executados através do comando:
```bash
# docker-compose run food-map composer test-request
```
Para rodar os testes unitários execute:
```bash
# docker-compose run food-map composer test-unit
```
Ou se preferir execute todos os testes através do comando:
```bash
# docker-compose run food-map composer test
```
Um resumo dos testes será exibido após a execução de qualquer um dos comandos.
Após executados os testes, um relatório detalhado ficará disponível em http://localhost:8080/coverage .

### Via composer

Para instalação via composer é necessário um ambiente com todos os requisitos citados acima configurados.
Apos clonar e entrar na pasta do projeto, execute o seguinte comando:
```bash
$ composer install
$ composer serve
```
A aplicação subirá na porta `8080` e para rodar os testes execute o comando `composer test-request`, `composer test-unit` ou `composer test` conforme explicado anteriormente.