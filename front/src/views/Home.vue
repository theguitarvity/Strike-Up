<template>
  <v-container class="home">
    <v-layout wrap v-if="!loading">
        
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
    <VLayout v-else>
      <v-flex >
        <Loading />
      </v-flex>
    </VLayout>
  </v-container>
</template>

<script>
import axios from 'axios';
import Loading from '@/components/Loading.vue';
export default {
  name: 'home',
  data() {
    return {
      loading: true,
      categorias:[]
    }
  },
  created() {
    axios.get('http://localhost:86/api/categorias').then(res => {
      this.categorias = res.data
      this.loading = false
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
  },
  components:{
    Loading
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
