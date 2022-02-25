<template lang="">
    <div>
        <b-table striped hover :items="ofertaProdutos.produtos" :fields="fields"></b-table>
    </div>
</template>
<script>
export default {
    created() {
        this.ofertaProdutos.produtos = this.ofertaProdutos;
    },
    data() {
        return {
            ofertaProdutos: {
                produtos: []
            },
            fields: [
                {
                    label: 'Produto',
                    key: "produto",
                    sortable: true
                },
                {
                    label: 'Valor',
                    key: "valor",
                    sortable: true
                },
                {
                    label: 'Descrição',
                    key: "descricao",
                    sortable: true
                },
            ],
        }
    },
    props: ['ofertaProdutos']
}
</script>
<style lang="">
    
</style>