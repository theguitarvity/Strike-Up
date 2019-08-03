<template>
   <v-expansion-panels>
                <v-expansion-panel
                    v-for="licitacao in licitacoes"
                    :key="licitacao.id"
                >
                    <v-expansion-panel-header>Licitação {{licitacao.codigo}}</v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <h4>{{licitacao.titulo}}</h4>
                        <vContainer grid-list-sm>
                            <v-chip style="margin:1px" v-for=" (tag, index) in licitacao.tags" :key="index">{{tag}} </v-chip>
                        </vContainer>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                </v-expansion-panels>
</template>

<script>

import axios from 'axios';
export default {
    name: 'licitacoes',
    created(){
        
    },
    
    data(){
        return{
            
        }
    },
    props:{
        licitacoes:Array
    }
}
</script>

<style>

</style>
