<template lang="">
    <div>
        <vue-snotify></vue-snotify>
        <b-form  @submit.prevent="salvarOferta" type="POST">
            <b-row>
                <b-col>        
                    <b-form-textarea v-model="oferta.descricao" :state="validarDescricao" 
                    placeholder=" Insira uma breve descrição da oferta" rows="3">
                    </b-form-textarea>
                    <b-form-invalid-feedback :state="validarDescricao">
                        Insira uma breve descrição da oferta
                    </b-form-invalid-feedback>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <select-produtos-component @envia-para-form-pai='pegarDadosFilho'></select-produtos-component>
                </b-col>
            </b-row>
            <div class="row">
                <div class="col-md d-flex justify-content-end">
                    <b-button type="submit" squared variant="success">
                    Salvar
                </b-button>
                </div>
            </div>
        </b-form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            oferta: {
                id: null,
                user_id: null,
                descricao: '',
                oferta_produto: []
            }
        }
    },
    methods: {
        salvarOferta: function() {
            let oferta = this.oferta;
            this.$store.dispatch('storeOferta', oferta)
                        .then((resp) => {
                            this.$snotify.success("Oferta inserida com sucesso.")
                        })
        },
        pegarDadosFilho: function(payload) {
            this.oferta.oferta_produto = payload.dados;
        } 
    },
    computed: {
        validarDescricao() {
            return this.oferta.descricao != ''; 
        }
    },
}
</script>
<style lang="">
    
</style>