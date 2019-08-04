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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
            sunt in culpa qui officia deserunt mollit anim id est laborum.
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
