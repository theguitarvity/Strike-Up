# Licid

O Licid é uma plataforma de consulta e análise de licitações no serviço público do estado do Mato Grosso do Sul. A plataforma é responsável por analisar fatores de risco em processos de compra e/ou contratação. O objetivo do Licid é auxiliar o cidadão a compreender as licitações ocorrentes no estado de Mato Grosso do sul. Mostrando de forma interativa, os dados existentes nos editais dos processos já realizados. O Licid também pode auxiliar os orgãos do governo, a fiscalizar os processos de licitações, com intuito de encontrar a existência de alguma irregularidade.
## Começando

Essas são as instruções e requisitos para inicializar e executar o sistema `#licid`

### Pré-requisitos

É recomendada a utilização dos sistemas operacionais `Unix-like` para a execução no ambiente de desenvolvimento, a máquina deve possuir o `Docker` na versão mínima `18.09.2`, recomenda-se utilizar sua última versão mais atualizada, consulte a documentação do docker [aqui](https://docs.docker.com/).

Em sistemas Linux é necessária a instalação do [docker-compose](https://docs.docker.com/compose/install/) e [Docker Engine](https://docs.docker.com/install/linux/docker-ce/ubuntu/) separadamente.

Em sistemas MacOS é necessária a instalação do [Docker Desktop](https://www.docker.com/products/docker-desktop) .


### Executando

Para executar aplicação em modo de desenvolvimento basta executar o comando abaixo na raiz do projeto

```
docker-compose up
```

#### Hosts e portas

Aplicação `http://localhost:9001`

Visualizador do Banco de dados `http://localhost:8089`

## Construído com

* [Laravel](https://laravel.com/) - aravel é um framework PHP livre e open-source.
* [MongoDB](https://www.mongodb.com/) - MongoDB é um software de banco de dados orientado a documentos livre, de código aberto e multiplataforma.
* [VueJS](https://vuejs.org/) - O Vue.js é uma estrutura JavaScript de código aberto para criar interfaces de usuário e aplicativos de página única.
* [Vuetify](https://vuetifyjs.com/pt-BR/) - Framework de componentes visuais.

## Autores

* **Fabio Ferreira** - *Desenvolvedor front-end* - [Github](https://github.com/fabiomferreira)
* **Matheus Oliveira** - *Desenvolvedor front-end* - [Github](https://github.com/matheus21)
* **Renan Batista** - *Desenvolvedor back-end* - [Github](https://github.com/renanprogramador)
* **Victor Lopes** - *Desenvolvedor back-end* - [Github](https://github.com/theguitarvity)

Veja todos os [contribuidores](https://github.com/hack-ms/Strike-Up/graphs/contributors) que participaram deste projeto.

## Licença

Este projeto utiliza a licença MIT veja em [LICENSE.md](LICENSE) para mais detalhes
