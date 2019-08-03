<template>
    <vContainer>
        <VLayout wrap>
            <VFlex>
                <VCard style="min-height:10em;" >
                    <vContainer style="" >
                        <VCard style="text-align:center; font-weight:bold;width:40%;float:left;margin-right:1em;">
                            <VIcon style="font-size:3em; color:purple;">{{icone}}</VIcon>
                            <VCardText>{{titulo}}</VCardText>
                        </VCard>
                        <vContainer style="margin-left:5%;">
                            <h4>Nº de licitações: {{licitacoes.length}}</h4>
                            <h4>Avaliação: {{avaliacao}}</h4>
                        </vContainer>
                        <v-rating v-model="avaliacao" readonly half-increments ></v-rating>
                        <vContainer>
                            
                        </vContainer>
                        
                    </vContainer>
                    
                </VCard>
                <VSpacer/>
                <Licitacoes v-bind:licitacoes="licitacoes" style="margin-top:1em"/>
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
            icone: null,
            titulo: null
       }
    },
    props:{
        
    },
    components:{
        Licitacoes
    },
    created(){
        this.icone = this.$route.params.icone
        this.retornaLicitacoes()
    },
    methods:{
        retornaLicitacoes(){
            const {link} = this.$route.params
            axios.get(link).then((response)=>{
                console.log(response.data)
                this.licitacoes = response.data.orgaos.licitacoes;
                this.avaliacao = parseFloat(response.data.nota);
                this.rangAvaliacao = parseInt(response.data.nota);
                this.titulo = response.data.titulo
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
