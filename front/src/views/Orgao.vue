<template>
    <vContainer>
        <VLayout wrap>
            <VFlex>
                <VCard style="min-height:10em;" >
                    <vContainer style="" >
                        <VCard style="text-align:center; font-weight:bold;width:40%;float:left;margin-right:1em;">
                            <VIcon style="font-size:3em; color:purple;">mdi-school</VIcon>
                            <VCardText>Educação</VCardText>
                        </VCard>
                        <vContainer style="margin-left:5%;">
                            <h4>Nº de licitações:</h4>
                            <h4>Avaliação: {{avaliacao}}</h4>
                        </vContainer>
                        <v-rating v-model="avaliacao" readonly half-increments ></v-rating>
                        <vContainer>
                            
                        </vContainer>
                        
                    </vContainer>
                    
                </VCard>
                <Licitacoes v-bind:licitacoes="licitacoes" />
            </VFlex>
        </VLayout>
    </vContainer>
</template>

<script>
import Licitacoes from '@/components/Licitacoes.vue';
import axios from 'axios';
export default {
    name:'orgao',
    data(){
       return{
            avaliacao:0,
            licitacoes:[],
            rangAvaliacao:0,
       }
    },
    props:{
        
    },
    components:{
        Licitacoes
    },
    created(){
        this.retornaLicitacoes()
    },
    methods:{
        retornaLicitacoes(){
            let licitacoes = axios.get('http://localhost:86/api/educacao/classificacao/').then((response)=>{
                console.log(response.data)
                this.licitacoes = response.data.orgaos;
                this.avaliacao = parseFloat(response.data.nota);
                this.rangAvaliacao = parseInt(response.data.nota);
                


            });
        }
    },
}
</script>

<style>

.v-rating i{
    margin-left:-10px;
}

</style>
