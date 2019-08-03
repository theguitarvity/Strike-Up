<template>
  <v-app>
    <v-app-bar color="purple" app>
      <v-toolbar-title class="headline text-uppercase">
        <v-btn text icon color="white">
            <v-icon>menu</v-icon>
        </v-btn>
      </v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>

    <v-content>
      <router-view />
    </v-content>
  </v-app>
</template>

<script>
import HelloWorld from './components/HelloWorld';
import Home from './views/Home';
export default {
  name: 'App',
  components: {
    HelloWorld,
  },
  data: () => ({
    //
  }),
};
</script>
