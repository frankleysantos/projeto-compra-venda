<template lang="">
    <div class="container">
        <h5>Minha Home</h5>
        <div class="row form-group">
            <div class="col-md-3" v-for="oferta in ofertas.data" :key="ofertas.data.id">
                <a :href="'oferta/show/negociacao/'+oferta.id">
                <b-card img-src="assets/img/unidos.jpg" img-alt="Image" style="height: 15rem;">
                    <b-card-text>
                        {{oferta.descricao}}
                    </b-card-text>
                </b-card>
                </a>
            </div>
        </div>
        <div class="row form-group" v-if="paginacao.qntPage > 0">
            <div class="col-md d-flex justify-content-center">
                <b-pagination-nav v-model="paginacao.currentPage" :link-gen="linkGen" :number-of-pages="paginacao.qntPage" use-router></b-pagination-nav>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        this.consultaOfertas()
    },
    data() {
        return {
            ofertas: [],
            paginacao: {
                perPage: 2,
                currentPage: 1,
                qntPage: null,
            }
        }
    },
    methods: {
        consultaOfertas: function() {
            return this.$store.dispatch('minhasOfertas', this.paginacao)
                    .then(() => {
                        this.ofertas = this.$store.state.oferta.ofertas;
                        this.paginacao.qntPage = this.ofertas.total;
                    })
        },
        linkGen() {
            this.paginacao.currentPage;
            this.consultaOfertas();
        }
    },
}
</script>
<style lang="">
    
</style>