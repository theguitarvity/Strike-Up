<template>
  <v-app >
    <v-app-bar color="purple" app>
      <v-btn text icon color="white">
          <v-icon>menu</v-icon>
      </v-btn>
      <v-spacer></v-spacer>
    </v-app-bar>

    <v-content style="background-color:#F7F6F6">
      <router-view />
    </v-content>
  </v-app>
</template>

<script>
import Home from './views/Home';
export default {
  name: 'App',
  data: () => ({
    //
  }),
};
</script>

<style>
@import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons';


</style>

