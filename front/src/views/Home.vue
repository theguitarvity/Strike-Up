<template>
  <v-container class="home">
    <v-layout wrap>
        <v-flex
          style="padding: 5px" 
          v-for="categoria in categorias"
          :key="categoria.id"
          xs6
        >
          <v-card @click="irParaDetalhes(categoria.id)" class="card" height="150px" link>
            <v-icon color="purple" :size="80">{{categoria.icone}}</v-icon>
            <span>{{categoria.nome}}</span>
          </v-card>
        </v-flex>
    </v-layout>
  </v-container>
</template>

<script>

export default {
  name: 'home',
  data() {
    return {
      categorias: [
        {
          id: 1,
          nome: 'Educação',
          icone: 'mdi-school'
        },
        {
          id: 2,
          nome: 'Saúde',
          icone: 'mdi-heart-outline'
        },
        {
          id: 3,
          nome: 'Segurança',
          icone: 'mdi-security'
        },
        {
          id: 4,
          nome: 'Infraestrutura',
          icone: 'mdi-office-building'
        },
      ]
    }
  },
  methods: {
    irParaDetalhes(id) {
      // this.$router.push({name: 'orgao'})
    }
  }
};
</script>

<style lang="scss" scoped>
.home {
  margin: 3rem 0;
  .card{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
}
</style>
