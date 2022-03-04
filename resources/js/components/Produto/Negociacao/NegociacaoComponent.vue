<template lang="">
    <!-- a mensagem:
        quem criou a oferta_id Oferta -> user_id
        quem faz a oferta -> Auth::user()->id -->
    <div>
        <div class="row">
            <div class="col-md-4">
                <b-carousel
                    id="carousel-fade"
                    style="text-shadow: 0px 0px 2px #000;"
                    fade
                    indicators
                    background="#ababab"

                >
                    <b-carousel-slide img-blank v-for="item in ofertas" :key="item.id">    
                        <div align="justify">
                            <p>Produto: <strong>{{item.produto}}</strong></p>
                            <p>Valor sugerido: <strong>R$ {{item.valor}}</strong></p>
                            <p>Descrição: 
                                <strong>{{item.descricao}}</strong>
                            </p>
                        </div>
                    </b-carousel-slide>

                </b-carousel>
            </div>

            <div class="col-md">
                <div class="row form-group">
                    <div class="col-md" v-for="item in filtro.mensagens" :key="item.envia_user_id">   
                        <div  v-if="item.envia_user_id ==  filtro.vendedor.user_id">
                            <div class="d-none">{{status =1}}</div>
                            Mensagem para o vendedor do produto
                            <b-button v-b-toggle.sidebar-1 variant="info" @click="mensagemOferta(item.envia_user_id)">Mensagem</b-button>
                        </div>
                    </div>
                </div>

                <div class="row form-group" v-for="item in filtro.mensagens" :key="item.envia_user_id">
                    <div class="col-md"  v-if="status == 0">   
                        Para conversar com o Comprador {{item.envia_user_id}} clique aqui
                        <b-button v-b-toggle.sidebar-1 variant="info" @click="mensagemOferta(item.envia_user_id)">Mensagem</b-button>
                    </div>
                    <div class="w-100"></div>
                </div>

                <div class="row form-group" v-if="status == 0 && filtro.vendedor && !filtro.mensagens.length">
                    <div class="col-md">   
                        Para conversar com o vendedor {{filtro.vendedor.user_id}} clique aqui
                        <b-button v-b-toggle.sidebar-1 variant="info" @click="mensagemOferta(filtro.vendedor.user_id)">Mensagem</b-button>
                    </div>
                    <div class="w-100"></div>
                </div>
            </div>

        </div>

        <!-- sidebar de chat -->
        <b-sidebar id="sidebar-1" title="Meu Chat" shadow class="sidebar-message">
            <div class="px-3 row form-group chat" ref="tela">
                <div class="col-md-12" v-for="mensagem in painel.mensagem">
                    <p  :class="user_logado == mensagem.envia_user_id ? 'comprador' : ''">
                        {{mensagem.descricao}}
                        <small class="form-text text-muted">{{mensagem.username}}</small>
                    </p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md">
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
            </div>
        </b-sidebar>
    </div>
</template>
<script>
export default {
    created() {
        this.mensagem.user_logado = this.user_logado;
        this.mensagem.oferta_id = this.oferta_id;
        this.filtroMensagens();
        this.mensagemOferta();
        this.produtosOferta();
        setInterval(() => {
                this.barraRolagem()
        }, 2000);  
        
    },
    data() {
        return {
            status: 0,
            filtro: [],
            painel: {
                mensagem: null
            },
            mensagem: {
                user_logado: null,
                recebe_user_id: null,
                oferta_id: null,
                envia_user_id: null,
                descricao: null,
                username:null
            },
            ofertas: [],
        }
    },
    methods: {
        filtroMensagens: function () {
            return this.$store.dispatch('filtroMensagens', this.mensagem)
                        .then(() => {
                            this.filtro = this.$store.state.mensagem.filtro;
                        })
        },

        enviarmensagem: function() {
            this.$store.dispatch('enviandoMensagem', this.mensagem)
                        .then(() => {
                            this.mensagem.descricao = null
                        })
                        .finally(() => {
                            setTimeout(() => {
                                    this.barraRolagem()
                            }, 2000);                           
                        })
        },
        mensagemOferta: function (user_oferta) {
            this.mensagem.envia_user_id = user_oferta;
            return this.$store.dispatch('mostrandoMensagem', this.mensagem)
                        .then(() => {
                            this.painel.mensagem = this.$store.state.mensagem.mensagens;
                        })
                        .finally(() => {
                            setTimeout(() => {
                                    this.barraRolagem()
                            }, 2000);                           
                        })
        },
        barraRolagem: function () {
            this.$refs.tela.scrollTo({
                top: this.$refs.tela.scrollHeight,
                let: 0,
                behavior: 'smooth'
            });
        },
        produtosOferta: function() {
            return this.$store.dispatch('showOfertaProdutos', this.mensagem.oferta_id)
                                .then((resp) => {
                                    this.ofertas = this.$store.state.produto.produtos;
                                })
        }
    },
    props: ['oferta_id', 'user_logado'],
}
</script>
<style scoped>
    .chat{
        overflow-y: auto;
        overflow-x: hidden;
        height: 400px;
        /* max-height: 400px; */
    }
    .comprador{
        text-align: right;
    }
    .vendedor {
        background-color: rgb(141, 223, 202);
        text-align: left;
        color: #fff;
        padding: 5px 5px 5px 5px;
        border-radius: 10px;
    }
    /* .sidebar-message {
        
    } */
</style>