<template lang="">
    <div>
        <b-row>
            <b-col>
                <b-card no-body>
                    <b-tabs card>

                        <b-tab title="Cadastro Ofertas" active>
                            <b-card-text>
                                <form-oferta-component></form-oferta-component>
                            </b-card-text>
                        </b-tab>

                        <b-tab title="Minhas Ofertas">
                            <b-card-text>
                                <minhas-ofertas-component></minhas-ofertas-component>
                            </b-card-text>
                        </b-tab>


                    </b-tabs>
                </b-card>
            </b-col>
        </b-row>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>