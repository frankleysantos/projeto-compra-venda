import Vue from 'vue'
import Vuex from 'vuex'

import oferta from './modules/oferta'
import produto from './modules/produto'

Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        oferta,
        produto
    }
})

export default store