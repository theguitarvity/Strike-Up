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
                        <vContainer>
                            <VIcon v-for="index in avaliacao" :key="index" style="color:orange">mdi-star</VIcon>
                        </vContainer>
                        
                    </vContainer>
                    
                </VCard>
                <Licitacoes />
            </VFlex>
        </VLayout>
    </vContainer>
</template>

<script>
import Licitacoes from '@/components/Licitacoes.vue';
export default {
    name:'orgao',
    data(){
       return{
            avaliacao:5
       }
    },
    props:{
        
    },
    components:{
        Licitacoes
    }
}
</script>

<style>

</style>
