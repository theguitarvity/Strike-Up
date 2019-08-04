<template>
    <vContainer class="sobre">
        <VLayout wrap>
            
            <VFlex class="center">
                <img src="@/assets/logo_geral.png" alt="logo-licid" srcset="" class="img-logo">

                <p style="color:#555; text-align:justify;">
                    O Licid é uma plataforma de consulta e análise de licitações no serviço
                    público do estado do Mato Grosso do Sul.
                    A plataforma é responsável por analisar fatores de risco 
                    em processos de compra e/ou contratação.
                    O objetivo do Licid é auxiliar o cidadão a compreender
                    as licitações ocorrentes no estado de Mato Grosso do sul. Mostrando de forma interativa,
                    os dados existentes nos editais dos processos já realizados. 
                    O Licid também pode auxiliar os orgãos do governo, a fiscalizar os processos de 
                    licitações, com intuito de encontrar a existência de alguma irregularidade.
                </p>
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
            </VFlex>
        </VLayout>
    </vContainer>
</template>

<script>
export default {
    name: 'sobre'

}
</script>

<style>

.img-logo{
    width: 10em;
}
.center{
    text-align: center;
}

</style>
