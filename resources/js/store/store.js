import Vue from 'vue'
import Vuex from 'vuex'

import oferta from './modules/oferta'
import produto from './modules/produto'
import mensagem from './modules/mensagem'
import user from './modules/user'


Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        oferta,
        produto,
        mensagem,
        user
    }
})

export default store