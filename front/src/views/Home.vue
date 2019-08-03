<template>
  <v-container class="home">
    <v-layout wrap>
      <v-flex style="padding: 5px" v-for="categoria in categorias" :key="categoria.id" xs6>
        <v-card>
          <v-icon>{{categoria.icone}}</v-icon>
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
          icone: 'favorite'
        },
        {
          id: 2,
          nome: 'Saúde',
          icone: 'mdi-heart-outline'
        },
        {
          id: 3,
          nome: 'Educação'
        },
        {
          id: 4,
          nome: 'Educação'
        },
      ]
    }
  }
};
</script>
