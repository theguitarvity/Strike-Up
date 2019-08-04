# Licid

O Licid é uma plataforma de consulta e análise de licitações no serviço público do estado do Mato Grosso do Sul. A plataforma é responsável por analisar fatores de risco em processos de compra e/ou contratação. O objetivo do Licid é auxiliar o cidadão a compreender as licitações ocorrentes no estado de Mato Grosso do sul. Mostrando de forma interativa, os dados existentes nos editais dos processos já realizados. O Licid também pode auxiliar os orgãos do governo, a fiscalizar os processos de licitações, com intuito de encontrar a existência de alguma irregularidade.

Atribuimos uma pontuação de 0 a 5 pontos para o desempenho em processos de licitação em orgãos o governo agrupados em categorias.

Para cada licitação são considerados critérios que podem indicar possíveis irregularidades, tais como: 

- (Alto Risco) Baixo capital (Menos de 10%) da empresa em relação ao valor previsto para licitação: #BaixoCapital

- (Alto Risco) Empresa existente a pouco tempo (Menos de ano em relação ao início do processo de licitação): #EmpresaJovem 

- (Médio Risco) Valor realizado superior a 25% em relação ao valor previsto da licitação (gastou mais): #GastouMais 

- (Alto Risco) Valor realizado superior a 35% em relação ao valor previsto da licitação (gastou muito mais): #GastouMuitoMais

- (Alto Risco) Empresa venceu muitas licitações nos ultimos seis meses (Acima de 5): #VenceuMuitasLicitacoes

Para critérios considerados de Alto Risco, é descontada pontuação de 1 ponto dos 5 iniciais, já para os de Médio Risco são descontados 0,5 pontos.

Para compor a nota de cada setor é realizada média das pontuações das suas licitações, gerando assim a nota final.

## Fontes utilizadas para a consulta dos dados

- API de consulta pública das empresas [https://www.hubdodesenvolvedor.com.br/](https://www.hubdodesenvolvedor.com.br/)

- Dados das licitações em CSV [http://www.dados.ms.gov.br/](http://www.dados.ms.gov.br/)

## Começando

Essas são as instruções e requisitos para inicializar e executar o sistema `#licid` no ambiente de desenvolvimento 

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

* [Laravel](https://laravel.com/) - Laravel é um framework PHP livre e open-source.
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
