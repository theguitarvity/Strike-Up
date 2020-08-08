<template >
    <v-dialog
        v-model="dialog"
        width="500"
      >
        <template v-slot:activator="{ on }">
          <v-btn
             depressed
            large
            color="purple"
            dark
            block
            class="btn-nav"
            v-on="on"
          >
          <v-icon dark left>mdi-calculator</v-icon>
            Método de cálculo
          </v-btn>
        </template>
  
        <v-card>
          <v-card-title
            class="headline grey lighten-2"
            primary-title
          >
            Como calculamos a nota?
          </v-card-title>
  
          <v-card-text style="font-size:18px; padding:2em; text-align:justify">
            Atribuimos uma pontuação de 0 a 5 pontos para o desempenho em processos de licitação em orgãos do governo agrupados em categorias. 
Para cada licitação são considerados critérios que podem indicar possíveis irregularidades, tais como: 

- (Alto Risco) Baixo capital (Menos de 10%) da empresa em relação ao valor previsto para licitação: #BaixoCapital
- (Alto Risco) Empresa existente a pouco tempo (Menos de ano em relação ao início do processo de licitação): #EmpresaJovem 
- (Médio Risco) Valor realizado superior a 25% em relação ao valor previsto da licitação (gastou mais): #GastouMais 
- (Alto Risco) Valor realizado superior a 35% em relação ao valor previsto da licitação (gastou muito mais): #GastouMuitoMais
- (Alto Risco) Empresa venceu muitas licitações nos ultimos seis meses (Acima de 5): #VenceuMuitasLicitacoes

Para critérios considerados de Alto Risco, é descontada pontuação de 1 ponto dos 5 iniciais, já para os de Médio Risco são descontados 0,5 pontos.
Para compor a nota de cada setor é realizada média das pontuações das suas licitações, gerando assim a nota final.
          </v-card-text>
  
          <v-divider></v-divider>
  
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="purple"
              text
              @click="dialog = false"
            >
              Entendi!
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
</template>

<script>
export default {
    name: 'metodoDeCalculi',
    data(){
        return{
            dialog:false
        }
    }

}
</script>

<style>

</style>
