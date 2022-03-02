<template lang="">
    <!-- a mensagem:
        quem criou a oferta_id Oferta -> user_id
        quem faz a oferta -> Auth::user()->id -->
    <div>
        negociação: {{oferta_id}} - {{user_logado}}
        <div class="row">
            <div class="col-md">
                
            </div>
        </div>

        <div class="row">
            <div class="col-md d-flex justify-content-end">
                <b-button v-b-toggle.sidebar-1 variant="info">Mensagem</b-button>
            </div>
        </div>


        <!-- sidebar de chat -->
        <b-sidebar id="sidebar-1" title="Meu Chat" shadow>
            <div class="px-3 py-2">
                <div class="row form-group" v-for="mensagem in painel.mensagem" :key="mensagem.id">
                    <div class="col-md" :align="user_logado == mensagem.oferta_user_id ? 'right' : 'left'">
                        {{mensagem.descricao}}
                    </div>
                </div>
                <b-form-textarea
                    id="textarea"
                    v-model="mensagem.descricao"
                    placeholder="Envie sua mensagem"
                    rows="3"
                    max-rows="6"
                    @keypress.enter="enviarmensagem"
                    >
                </b-form-textarea>
            </div>
        </b-sidebar>
    </div>
</template>
<script>
export default {
    created() {
        this.mensagem.oferta_user_id = this.user_logado;
        this.mensagem.oferta_id = this.oferta_id;
        this.mensagemOferta();
    },
    data() {
        return {
            painel: {
                mensagem: null
            },
            mensagem: {
                oferta_id: null,
                oferta_user_id: null,
                descricao: null
            }
        }
    },
    methods: {
        enviarmensagem: function() {
            this.$store.dispatch('enviandoMensagem', this.mensagem)
                        .then(() => {
                            console.log(this.$store.state.mensagem.mensagens);
                            this.mensagem.descricao = null
                        })
        },
        mensagemOferta: function () {
            return this.$store.dispatch('mostrandoMensagem', this.mensagem)
                        .then(() => {
                            this.painel.mensagem = this.$store.state.mensagem.mensagens;
                        })
        }
    },
    props: ['oferta_id', 'user_logado']
}
</script>
<style lang="">
    
</style>