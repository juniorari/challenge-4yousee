# Fullstack Challenge 20230720

## Introdução

Este é um desafio para que possamos ver as suas habilidades como Fullstack Developer.

Nesse desafio a 4YouSee que fornece tecnologia de ponta para [Digital Signage](https://www.4yousee.com.br/digital-signage/) e atende diversos clientes da área de publicidade e sinalização em geral como por exemplo cinemas, empresas de telefonia, varejo, etc…

### Antes de começar

- Prepare o projeto para ser disponibilizado no Github, copiando o conteúdo deste repositório para o seu (ou utilize o fork do projeto e aponte para o Github). Confirme que a visibilidade do projeto é pública (não esqueça de colocar no readme a referência a este challenge);
- O projeto deve utilizar a Linguagem específica na sua Vaga (caso esteja se candidatando). Por exempo: Node.js, C#, Java, Python, R, Scala e entre outras;
- Considere como deadline 5 dias a partir do início do desafio. Caso tenha sido convidado a realizar o teste e não seja possível concluir dentro deste período, avise a pessoa que o convidou para receber instruções sobre o que fazer.
- Documentar todo o processo de investigação para o desenvolvimento da atividade (README.md no seu repositório); os resultados destas tarefas são tão importantes do que o seu processo de pensamento e decisões à medida que as completa, por isso tente documentar e apresentar os seus hipóteses e decisões na medida do possível.

## Objetivos

O objetivo deste teste é resolver um problema real de um dos sistemas mantidos pela 4YouSee para o ramo de telefonia e varejo.
Esta solução é responsável por exibir preço dos planos vendidos junto aos aparelhos de telefone e a sua principal característica é a possibilidade de associar vários planos a um telefone e diferentes localidades do país.


## Critérios de aceitação
Repositório: [https://bitbucket.org/4yousee/avaliacao-desenvolvedor](https://bitbucket.org/4yousee/avaliacao-desenvolvedor)

O candidato deverá escrever um programa que receberá uma lista de planos(data.json) e deverá retornar a lista filtrada baseada nos critérios abaixo:

- O sistema só poderá exibir planos que tenham schedule.startDate válidos, ou seja, menor que a data atual.
- O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name, localidade dando preferência quem possuir o schedule.startDate mais recente.
- Note que o campo localidade possui uma hierarquia (PAÍS -> ESTADO -> CIDADE). Esta hierarquia deverá ser respeitada, de maneira que a cidade terá maior prioridade que estado e  país. O sistema só poderá exibir 1 única vez planos que tenham os mesmos : name  dando preferência a hierarquia de localidades.

## Critérios de avaliação

*   **Funcionalidade**: atender todos os critérios de aceitação mencionados;
*   **Organização do projeto**: diretórios, arquivos, classes, etc ...;
*   **Legibilidade do código**;
*   Adoção de boas práticas de desenvolvimento de software;
*   **Criatividade**: O escopo deste teste é bem aberto, do ponto de vista de requisitos técnicos, propositalmente, para que você possa demonstrar sua criatividade e propor a melhor solução que atenda a soliictação dentro do prazo disponibilizado :)
*   **Propor melhorias  no arquivo JSON disponibilizado.**


![imagem](img.png "imagem")



## O que é e o que não é permitido


- <span style="color:green">É permitido</span> Pesquisar no Google;
- <span style="color:green">É permitido</span> perguntar sobre as regras de negócio para o entrevistador;
- <span style="color:red">Não é permitido</span> utilizar bibliotecas de terceiros. Ex.: lodash, jquery, angular, laravel, etc. Queremos ver a sua capacidade de resolver um problema de lógica de programação.
- <span style="color:red">Não é permitido</span> fazer perguntas técnicas para o entrevistador.
- <span style="color:orange">Não é necessário</span> criar o layout da aplicação no exemplo. O importante para a avaliação é conseguir realizar o filtro proposto. Se for possível fazer o layout durante o tempo do teste será um diferencial.

## Considerações finais

*   Acreditamos que o teste acima possa ser concluído em menos de 1h30min;

## Readme do Repositório

- Deve conter o título do projeto
- Uma descrição sobre o projeto em frase
- Deve conter uma lista com linguagem, framework e/ou tecnologias usadas
- Como instalar e usar o projeto (instruções)
- Não esqueça o [.gitignore](https://www.toptal.com/developers/gitignore)
- Se está usando github pessoal, referencie que é um challenge by coodesh:  

>  This is a challenge by [Coodesh](https://coodesh.com/)

## Finalização e Instruções para a Apresentação

Avisar sobre a finalização e enviar para correção.

1. Confira se você respondeu o Scorecard anexado na Vaga que se candidatou;
2. Confira se você respondeu o Mapeamento anexado na Vaga que se candidatou;
3. Acesse [https://coodesh.com/challenges/review](https://coodesh.com/challenges/review);
4. Adicione o repositório com a sua solução;
5. Grave um vídeo, utilizando o botão na tela de solicitar revisão da Coodesh, com no máximo 5 minutos, com a apresentação do seu projeto. Utilize o tempo para:
- Explicar o objetivo do desafio
- Quais tecnologias foram utilizadas
- Mostrar a aplicação em funcionamento
- Foque em pontos obrigatórios e diferenciais quando for apresentar.
6. Adicione o link da apresentação do seu projeto no README.md.
7. Verifique se o Readme está bom e faça o commit final em seu repositório;
8. Confira a vaga desejada;
9. Envie e aguarde as instruções para seguir no processo. Sucesso e boa sorte. =)

## Suporte

Use a [nossa comunidade](https://discord.gg/rdXbEvjsWu) para tirar dúvidas sobre o processo ou envie uma mensagem diretamente a um especialista no chat da plataforma. 
