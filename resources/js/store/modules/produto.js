import Axios from "axios"

export default {

    state: {
        produtos: []
    },

    mutations:{
        SHOW_PRODUTOS(state, show_produtos){
            state.produtos = show_produtos;
       },
    },

    actions:{
        showProdutos(context, parametro){
            return Axios.get('produto/show/'+parametro)
                        .then(response=> context.commit('SHOW_PRODUTOS', response.data))
        },

        showOfertaProdutos(context, parametro){
            return Axios.get("produto/show/oferta/"+parametro)
                        .then(response=> context.commit('SHOW_PRODUTOS', response.data))
        },

    },
}