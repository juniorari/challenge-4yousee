# Desafio Técnico proposto pela 4YouSee na Coodesh

## Introdução

Neste desafio, criamos um sistema que vai ler de um arquivo `json` e retornar os melhores dados
com base em alguns filtros estipulados pela 4YouSee. 

Os filtros são os seguintes:

- O sistema só poderá exibir planos que tenham schedule.startDate válidos, ou seja, menor que a data atual.
- O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name, localidade dando preferência quem possuir o schedule.startDate mais recente.
- Note que o campo localidade possui uma hierarquia (PAÍS -> ESTADO -> CIDADE). Esta hierarquia deverá ser respeitada, de maneira que a cidade terá maior prioridade que estado e  país. O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name  dando preferência a hierarquia de localidades.


## Tecnologias utilizadas


- [Docker](https://www.docker.com)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Imagem Docker PHP 8.2 FPM](https://hub.docker.com/_/php/)


## Instalação

Depois de instalado o docker, executar os seguintes comandos para baixar a imagem docker e criar os containers:

```
docker-compose up --build -d
```

Após baixar a imagem com o PHP e recursos necessários, e a criação do container, abrir o sistema no browser no endereço [http://localhost:8000/](http://localhost:8000/)
 
E pronto!

>  This is a challenge by [Coodesh](https://coodesh.com/) 


Link da apresentação do projeto:


