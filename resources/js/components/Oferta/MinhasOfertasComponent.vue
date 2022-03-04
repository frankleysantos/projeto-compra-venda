<template lang="">
    <div>
        <b-row>
            <b-col>
                    <b-form-group
                    label-for="filter-input"
                    class="mb-0"
                    >
                    <b-input-group size="sm">
                        <b-form-input
                        id="filter-input"
                        v-model="filter"
                        type="search"
                        placeholder="Filtrar por nome"
                        ></b-form-input>

                        <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''">Limpar</b-button>
                        </b-input-group-append>
                    </b-input-group>
                    </b-form-group>
            </b-col>
            <b-col>
                    <b-form-group
                    label="Por página"
                    label-for="per-page-select"
                    label-cols-md="4"
                    label-align-sm="right"
                    label-size="sm"
                    class="mb-0"
                    >
                    <b-form-select
                        id="per-page-select"
                        v-model="perPage"
                        :options="pageOptions"
                        size="sm"
                    ></b-form-select>
                    </b-form-group>
            </b-col>

            <b-col>
                    <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    align="fill"
                    size="sm"
                    >
                    </b-pagination>
            </b-col>
        </b-row>

        <b-table striped hover :items="minhasOfertas" :fields="fields" :current-page="currentPage" :per-page="perPage" :filter="filter">
        <template #cell(acao)="row">
            <button type="button" class="btn btn-primary">
                <i class="fa fa-eye" aria-hidden="true" @click="produtosOfertas(row.item.id)">Ver Produtos</i>
            </button>
        </template>
      </b-table>

      
      <!-- Modal -->
        <b-modal ref="modal-oferta-produtos"  title="Produtos Cadastrados na orferta" hide-footer size="xl">
            <oferta-produtos-component :propsOfertaProdutos="ofertaProdutos"></oferta-produtos-component>
        </b-modal>
      
    </div>
</template>
<script>
export default {
    created() {
        this.consultaMinhasOfertas();
    },
    data() {
        return {
            minhasOfertas: [],
            ofertaProdutos: [],
            filter: null,
            filterOn: [],
            totalRows: 0,
            currentPage: 1,
            perPage: 5,
            pageOptions: [5, 25, 50, { value: 100, text: "Mostrar Todos" }],
            fields:[
                {
                    label: 'Descrição',
                    key: "descricao",
                    sortable: true
                },
                {
                    label: 'Ações',
                    key: "acao",
                    sortable: true
                },
            ],
            paginacao: {
                perPage: null,
            }
        }
    },
    methods: {
        consultaMinhasOfertas: function() {
            return this.$store.dispatch('minhasOfertas', this.paginacao)
                            .then((e) => {
                                this.minhasOfertas = this.$store.state.oferta.ofertas;
                            })
        },
        produtosOfertas: function(oferta_id) {
            return this.$store.dispatch('showOfertaProdutos', oferta_id)
                        .then((resp) => {
                            this.ofertaProdutos = this.$store.state.produto.produtos;
                            this.$refs['modal-oferta-produtos'].show();
                        })
        }
    },      
}
</script>
<style lang="">
    
</style>