<template>
  <v-app >
    <v-app-bar color="purple" app>
      <v-app-bar-nav-icon color="white" @click.stop="drawer = !drawer"/>
      <v-spacer/>
      <router-link to="/">
        <img src="@/assets/logo_branco.png" alt="logo_branco" srcset="" class="logo-menu">
      </router-link>
    </v-app-bar>
    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
      <v-container style="background: #f0f0f0" fill-height>
          <v-layout wrap column>
              <v-flex>
                <img src="@/assets/logo_geral.png" alt="logo-licid" srcset="" class="img-logo">
                <v-btn
                  depressed
                  large
                  color="purple"
                  dark
                  block
                  class="btn-nav"
                  to="/"
                >
                  <v-icon dark left>house</v-icon>
                  Home
                </v-btn>
                <v-btn
                  depressed
                  large
                  color="purple"
                  dark
                  block
                  class="btn-nav"
                  to="/sobre"
                >
                  <v-icon dark left>mdi-information</v-icon>
                  Sobre
                </v-btn>
                <v-btn
                  depressed
                  large
                  color="purple"
                  dark
                  block
                  class="btn-nav"
                  href="http://www.tcu.gov.br/arquivosrca/ManualOnLine.htm"
                  target="_blank"
                >
                  <v-icon dark left>mdi-book-open-variant</v-icon>
                  Legislação
                </v-btn>
              </v-flex>
          </v-layout>
      </v-container>
    </v-navigation-drawer>

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
    drawer: null
  }),
};
</script>

<style>
@import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons';

.logo-menu{
  width: 5em;
}

</style>

<style lang="scss" scoped>
.btn-nav {
  margin: .5rem 0;
}
</style>

