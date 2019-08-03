<template>
  <v-container class="home">
    <v-layout wrap>
        <v-flex
          style="padding: 5px" 
          v-for="(categoria, key) in categorias"
          :key="key"
          xs6
        >
          <v-card @click="irParaDetalhes(categoria)" class="card" height="150px" link>
            <v-icon color="purple" :size="80">{{categoria.icone}}</v-icon>
            <span>{{categoria.titulo}}</span>
          </v-card>
        </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import axios from 'axios'
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
  created() {
    axios.get('http://localhost:86/api/categorias').then(res => {
      this.categorias = res.data
    })
  },
  methods: {
    irParaDetalhes(categoria) {
      const {link, icone} = categoria
      let chave = Object.keys(this.categorias).find(key => this.categorias[key] == categoria)
      this.$router.push({
        path:`/orgao/${chave}`,
        params: {link, icone}
        })
    }
  }
};
</script>

<style lang="scss" scoped>
.home {
  margin: 1rem 0;
  .card{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
}
</style>
