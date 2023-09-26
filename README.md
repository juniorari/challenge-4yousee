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
- [Docker Compose](https://docs.docker.com/compose/)
- [Imagem Docker PHP 8.2 FPM](https://hub.docker.com/_/php/)


## Instalação

Antes de iniciar, é necessário ter instalado o Docker no computador. Caso não tenha instalador, seguir as orientações [neste link](https://docs.docker.com/desktop)

Clonar o projeto na máquina local e entrar no diretório:

```
git clone https://github.com/juniorari/challenge-4yousee
cd challenge-4yousee/
```



Depois de instalado o docker, executar os seguintes comandos para baixar a imagem docker e criar os containers:

```
docker-compose up --build -d
```

Após baixar a imagem com o PHP e recursos necessários, e a criação do container, abrir o sistema no browser no endereço [http://localhost:8000/](http://localhost:8000/)
 
E pronto!

#### Sugestão de melhorias no arquivo json


Como sugestão de melhoria para padronização do arquivo `.json`, poderíamos:
 
 - Colocar os nomes dos parâmetros no formato camelCase;
 - Remover underscore "_" dos nomes (`monthly_fee`) seguindo a sugestão acima;
 - Colocar todos os nomes dos parâmetros em inglês;
 - Remover as linhas em branco desnecessário;
 

___

Link da apresentação do projeto: [https://www.loom.com/embed/4d7d21e48be04fd8bd001bb3fe5f8e30](https://www.loom.com/embed/4d7d21e48be04fd8bd001bb3fe5f8e30)


>  This is a challenge by [Coodesh](https://coodesh.com/)