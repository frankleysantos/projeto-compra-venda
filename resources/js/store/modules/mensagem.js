import Axios from "axios"

export default {

    state: {
        mensagens: []
    },

    mutations:{
        SHOW_MENSAGENS(state, show_mensagens){
            state.mensagens = show_mensagens;
       },
       STORE_MENSAGEM(state, nova_mensagem) {
            state.mensagens.push(nova_mensagem)
       }
    },

    actions:{
        enviandoMensagem(context, parametros){
            return Axios.post('../../../mensagem/store', parametros)
                        .then(response => context.commit('STORE_MENSAGEM',response.data));
        },

        mostrandoMensagem(context, parametro){
            return Axios.post("../../../mensagem/show", parametro)
                        .then(response=> context.commit('SHOW_MENSAGENS', response.data))
        },

    },
}