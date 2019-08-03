<template>
   <v-expansion-panels>
                <v-expansion-panel
                    v-for="licitacao in licitacoes"
                    :key="licitacao.id"
                >
                    <v-expansion-panel-header>Licitação {{licitacao.codigo}} 

                        <VFlex style="padding-left:0.5rem;">
                            <div class="circle" :style="{backgroundColor:licitacao.classificacao_risco.cor}" >

                            </div>
                        </VFlex>
                    </v-expansion-panel-header>

                    <v-expansion-panel-content>
                        <h5>Empresa: {{licitacao.razao_social }}</h5>
                        <h5>CNPJ: {{licitacao.cnpj}}</h5>

                        <vContainer grid-list-sm>
                           <VFlex>
                                <v-chip style="margin:1px" v-for=" (tag, index) in licitacao.tags" :key="index">{{tag}} </v-chip>
                            </VFlex>
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
.circle{
    width: 15px;
    height: 15px;
    border-radius: 50%;
    
    
}
</style>
