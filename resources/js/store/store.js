import Vue from 'vue'
import Vuex from 'vuex'

import oferta from './modules/oferta'
import produto from './modules/produto'
import mensagem from './modules/mensagem'


Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        oferta,
        produto,
        mensagem
    }
})

export default store