<template>
    <vContainer>
        <VLayout wrap>
            <VFlex>
                <v-expansion-panels>
                <v-expansion-panel
                    v-for="licitacao in licitacoes"
                    :key="licitacao.id"
                >
                    <v-expansion-panel-header>Licitação {{licitacao.id}}</v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <h4>{{licitacao.titulo}}</h4>
                        <vContainer >
                            <v-chip style="margin:1px" v-for=" i in 3" :key="i">#teste </v-chip>
                        </vContainer>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                </v-expansion-panels>
            </VFlex>
        </VLayout>
    </vContainer>
</template>

<script>
export default {
    name: 'licitacoes',
    data(){
        return{
            licitacoes:[
                {
                    id:0,
                    codigo:'teste',
                    titulo:'Empresa x',
                    tags:[
                        '#VenceuMaisLicitações',
                        '#PoucoCapital'
                    ]

                },
                {
                    id:1,
                    codigo:'teste',
                    titulo:'Empresa x',
                    tags:[
                        '#VenceuMaisLicitações',
                        '#PoucoCapital'
                    ]

                },
                {
                    id:2,
                    codigo:'teste',
                    titulo:'Empresa x',
                    tags:[
                        '#VenceuMaisLicitações',
                        '#PoucoCapital'
                    ]

                }

            ]
        }
    }
}
</script>

<style>

</style>
